using QuanLyQuanCafe.DAO;
using QuanLyQuanCafe.DTO;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Globalization;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QuanLyQuanCafe
{
    public partial class fTableManager : Form
    {
        private Account loginAccount;

        public Account LoginAccount
        {
            get { return loginAccount; }
            set { loginAccount = value; }
        }
        public fTableManager(Account acc)
        {
            InitializeComponent();
            this.loginAccount = acc;
            ChangeAccount(loginAccount.Type); 
            LoadTable();
            LoadCategory();
            LoadComboboxTable(cbSwitchTable);
        }
        #region Method
        void ChangeAccount(int type)
       {
            
           adminToolStripMenuItem.Enabled = type == 1 ;
           thôngTinTàiKhoảnToolStripMenuItem.Text += "(" + LoginAccount.DisplayName + ")";
        }
        void LoadCategory() {
            List<Category> listCategory = CategoryDAO.Instance.GetListCategory();
            cbCategory.DataSource = listCategory;
            cbCategory.DisplayMember = "Name";
            
        }
        void LoadFoodListByCategoryID(int id) {
            List<Food> listfood = FoodDAO.Instance.GetFoodByCategoryID(id);
            cbFood.DataSource = listfood;
            cbFood.DisplayMember = "Name";
        }
        void LoadTable()
        {
            flpTable.Controls.Clear();
            List<Table> tableList = TableDAO.Instance.LoadTableList();
            foreach (Table item in tableList)
            {
                Button btn = new Button() { Width = TableDAO.TableWidth, Height = TableDAO.TableHeight };
                btn.Text = item.Name + Environment.NewLine + item.Status;
                btn.Click += btn_Click;
                btn.Tag = item;
                switch (item.Status)
                { 
                    case "Trống":
                        //btn.BackColor = Color.Aqua;
                        //D:\BaiTapCuaTui\PTUDWD\DoAn\Project\QuanLyQuanCafe\hinhanh
                        Image myimage = new Bitmap(@"D:\BaiTapCuaTui\PTUDWD\DoAn\Project\QuanLyQuanCafe\hinhanh\table.png");
                        btn.BackgroundImage = myimage;
                       // btn.BackgroundImage = Image.FromFile
                           // (System.Environment.GetFolderPath(System.Environment.SpecialFolder.Personal) + @"table.jpg");
                        
                        btn.ForeColor = Color.Blue;
                        btn.Font = new Font(btn.Font,FontStyle.Bold);


                        break;
                    default:
                        //btn.BackColor = Color.LightPink;
                        Image myimage1 = new Bitmap(@"D:\BaiTapCuaTui\PTUDWD\DoAn\Project\QuanLyQuanCafe\hinhanh\people1.png");
                        btn.BackgroundImage = myimage1;
                        btn.ForeColor = Color.Red;
                        btn.Font = new Font(btn.Font, FontStyle.Bold);
                        break;
                }

                flpTable.Controls.Add(btn);
            }
        }

      
        void ShowBill(int id)
        {
            lsvBill.Items.Clear();
            List<QuanLyQuanCafe.DTO.Menu> listBillInfo = MenuDAO.Instance.GetListMenuByTable(id);
            float totalPrice = 0;
            foreach (QuanLyQuanCafe.DTO.Menu item in listBillInfo)
            {
                ListViewItem lsvItem = new ListViewItem(item.FoodName.ToString());
                lsvItem.SubItems.Add(item.Count.ToString());
                lsvItem.SubItems.Add(item.Price.ToString());
                lsvItem.SubItems.Add(item.TotalPrice.ToString());
                totalPrice += item.TotalPrice;
                lsvBill.Items.Add(lsvItem);
            }
            CultureInfo culture = new CultureInfo("vi-VN");
            txtTotalPrice.Text = totalPrice.ToString("c",culture);
            
        }
        void LoadComboboxTable(ComboBox cb)
        {
            cb.DataSource = TableDAO.Instance.LoadTableList();
            cb.DisplayMember = "Name";
        }
       
        #endregion


        #region Events
        private void chuyểnBànToolStripMenuItem_Click(object sender, EventArgs e)
        {
            btnSwitchTable_Click(this, new EventArgs());
        }
        private void btnSwitchTable_Click(object sender, EventArgs e)
        {
            int id1 = (lsvBill.Tag as Table).ID;
            int id2 = (cbSwitchTable.SelectedItem as Table).ID;

            if (MessageBox.Show(string.Format("Bạn có thực sự muốn chuyển bàn {0} qua bàn {1}", (lsvBill.Tag as Table).Name, (cbSwitchTable.SelectedItem as Table).Name), "Thông báo", MessageBoxButtons.OKCancel) == System.Windows.Forms.DialogResult.OK)
            {
                TableDAO.Instance.SwitchTable(id1, id2);
                LoadTable();
            }
        }

        private void flpTable_Paint(object sender, PaintEventArgs e)
        {
            
        }

        private void thêmMónToolStripMenuItem_Click(object sender, EventArgs e)
        {
            btnAddFood_Click(this, new EventArgs());
        }

        private void thanhToánToolStripMenuItem_Click(object sender, EventArgs e)
        {
            btnCheckOut_Click(this, new EventArgs());
        }
        private void btn_Click(object sender, EventArgs e)
        {
            int tableID = ((sender as Button).Tag as Table).ID;
            lsvBill.Tag = (sender as Button).Tag;
            ShowBill(tableID);
        }
        private void đăngXuấtToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void thôngTinCáNhânToolStripMenuItem_Click(object sender, EventArgs e)
        {
            fAccountProfile f = new fAccountProfile(loginAccount);
            f.UpdateAcount += f_UpdateAccount;
            f.ShowDialog();
        }
        void f_UpdateAccount(object sender, AccountEvent e)
        {
            thôngTinTàiKhoảnToolStripMenuItem.Text = "Thông tin tài khoản (" + e.Acc.DisplayName + ")";
        }

        private void adminToolStripMenuItem_Click(object sender, EventArgs e)
        {
            fAdmin f = new fAdmin();
            f.loginAccount = LoginAccount;
            f.InsertFood += f_InsertFood;
            f.UpdateFood += f_UpdateFood;
            f.DeleteFood += f_DeleteFood;
            f.ShowDialog();
        }

        private void f_DeleteFood(object sender, EventArgs e)
        {
            LoadFoodListByCategoryID((cbCategory.SelectedItem as Category).ID);
            if (lsvBill.Tag != null)
                ShowBill((lsvBill.Tag as Table).ID);
            LoadTable();
        }

        private void f_UpdateFood(object sender, EventArgs e)
        {
            LoadFoodListByCategoryID((cbCategory.SelectedItem as Category).ID);
            if(lsvBill.Tag != null)
            ShowBill((lsvBill.Tag as Table).ID);
        }

        private void f_InsertFood(object sender, EventArgs e)
        {
            LoadFoodListByCategoryID((cbCategory.SelectedItem as Category).ID);
            if (lsvBill.Tag != null)
                ShowBill((lsvBill.Tag as Table).ID);
        }
        

        public float TotalPrice { get; set; }

        public float totalPrice { get; set; }

        private void cbCategory_SelectedIndexChanged(object sender, EventArgs e)
        {
            int id = 0;
            ComboBox cb = sender as ComboBox;

            if(cb.SelectedItem == null)
                return;


            Category selected = cb.SelectedItem as Category;
            id = selected.ID;
            LoadFoodListByCategoryID(id);
        }

        private void btnAddFood_Click(object sender, EventArgs e)
        {
            Table table = lsvBill.Tag as Table;

            if (table == null)
            {
                MessageBox.Show("Hãy chọn bàn");
                return;
            }
            int idBill = BillDAO.Instance.GetUncheckBillIDByTableID(table.ID);
            int foodID = (cbFood.SelectedItem as Food).ID;
            int count = (int)mnAddFood.Value;
            if (idBill == -1)
            {
                BillDAO.Instance.InsertBill(table.ID);
                BillInfoDAO.Instance.InsertBillInfo(BillDAO.Instance.GetMaxIDBill(), foodID, count);
            }
            else
            {
                BillInfoDAO.Instance.InsertBillInfo(idBill, foodID, count);
            
            }
            ShowBill(table.ID);
            LoadTable();
        }

        private void btnCheckOut_Click(object sender, EventArgs e)
        {
            Table table = lsvBill.Tag as Table;
            if (table == null)
            {
                MessageBox.Show("Hãy chọn bàn");
                return;
            }
            int idBill = BillDAO.Instance.GetUncheckBillIDByTableID(table.ID);
            int discount = (int)nmDiscount.Value;
            string chuoigia = txtTotalPrice.Text.Split(',')[0];
            double totalPrice = Convert.ToDouble(chuoigia)*1000;
            double finalTotalPrice = totalPrice - (totalPrice/100)*discount;
            if (idBill != -1)
            {
                if (MessageBox.Show(string.Format("Bạn có chắc thanh toán hóa đơn cho {0}\nTổng tiền - (Tổng tiền / 100) x Giảm giá\n=> {1} - ({1} / 100) x {2} = {3}" ,table.Name,totalPrice,discount, finalTotalPrice), "Thông báo", MessageBoxButtons.OKCancel) == System.Windows.Forms.DialogResult.OK)
                {
                    BillDAO.Instance.CheckOut(idBill, discount, (float)finalTotalPrice);
                    ShowBill(table.ID);
                    LoadTable();
                }
            }
        }
        #endregion

        

        

       

    }       
}
