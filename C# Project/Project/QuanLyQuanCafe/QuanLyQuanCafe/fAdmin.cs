using QuanLyQuanCafe.DAO;
using QuanLyQuanCafe.DTO;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QuanLyQuanCafe
{
    public partial class fAdmin : Form
    {
        BindingSource fooList = new BindingSource();
        BindingSource khoList = new BindingSource();
        BindingSource accountList = new BindingSource();
        BindingSource categoryList = new BindingSource();
        BindingSource tableList = new BindingSource();
        public Account loginAccount;
        public fAdmin()
        {
            InitializeComponent();
            dtgvFood.DataSource = fooList;
            dtgvAccount.DataSource = accountList;
            dtgvCategory.DataSource = categoryList;
            dtgvTable.DataSource = tableList;
            dtgvKho.DataSource = khoList;
            LoadDateTimePockerBill();
            LoadListBillByDate(dtpDateFrom.Value, dtpDateTo.Value);
            LoadListFood();
            LoadListKho();
            AddFoodBinding();
            AddKhoBinding();
            AddAccountBinding();
            AddCategoryBinding();
            AddTableBinding();
            LoadCategory();
            LoadAccount();
            LoadListTable();
            LoadListKho();
            LoadCategoryInfoCombobox(cbFoodCategory);
            LoadKhoInfoCombobox(cbTru);
        }
        #region methods
        void InsertTable(string name, string status)
        {
            if (TableDAO.Instance.InsertTable(name, status))
            {
                MessageBox.Show("Thêm bàn thành công");
            }
            else
            {
                MessageBox.Show("Thêm bàn thất bại");
            }
            LoadListTable();
        }
        void UpdateTable(string name, string status,int id)
        {
            if (TableDAO.Instance.UpdateTable(name, id,status))
            {
                MessageBox.Show("Cập nhật bàn thành công");
            }
            else
            {
                MessageBox.Show("Cập nhật bàn thất bại");
            }
            LoadListTable();
        }

        void DeleteTable(int id)
        {

            if (TableDAO.Instance.DeleteTable(id))
            {
                MessageBox.Show("Xóa bàn thành công");
            }
            else
            {
                MessageBox.Show("Xóa bàn thất bại");
            }
            LoadListTable();
        }
        void InsertCategory(string name)
        {
            if (CategoryDAO.Instance.InsertCategory(name))
            {
                MessageBox.Show("Thêm danh mục thành công");
            }
            else
            {
                MessageBox.Show("Thêm danh mục thất bại");
            }
            LoadCategory();
        }
        void UpdateCategory(string name, int id)
        {
            if (CategoryDAO.Instance.UpdateCategory(name, id))
            {
                MessageBox.Show("Cập nhật danh mục thành công");
            }
            else
            {
                MessageBox.Show("Cập nhật danh mục thất bại");
            }
            LoadCategory();
        }

        void DeleteCategory(int id)
        {
            
            if (CategoryDAO.Instance.DeleteCategory(id))
            {
                MessageBox.Show("Xóa danh mục thành công");
            }
            else
            {
                MessageBox.Show("Xóa danh mục thất bại");
            }
            LoadCategory();
        }
        List<Food> SearchFoodByName(string name)
        {
            List<Food> listFood = FoodDAO.Instance.SearchFoodByName(name);
            return listFood;
        }
        void LoadDateTimePockerBill()
        {
            DateTime today = DateTime.Now;
            dtpDateFrom.Value = new DateTime(today.Year, today.Month, 1);
            dtpDateTo.Value = dtpDateFrom.Value.AddMonths(1).AddDays(-1);
        }
        void LoadListBillByDate(DateTime checkIn, DateTime checkOut)
        {
            dtgvBill.DataSource = BillDAO.Instance.GetListBillByDate(checkIn, checkOut);
            dtgvBill.Columns[0].DefaultCellStyle.Alignment = DataGridViewContentAlignment.MiddleCenter;
            dtgvBill.Columns[1].DefaultCellStyle.Alignment = DataGridViewContentAlignment.MiddleCenter;
            dtgvBill.Columns[2].DefaultCellStyle.Alignment = DataGridViewContentAlignment.MiddleCenter;
            dtgvBill.Columns[3].DefaultCellStyle.Alignment = DataGridViewContentAlignment.MiddleCenter;
            dtgvBill.Columns[4].DefaultCellStyle.Alignment = DataGridViewContentAlignment.MiddleCenter;
                
        }
        void LoadListFood()
        {
            fooList.DataSource = FoodDAO.Instance.GetListFood();

        }
        void LoadListKho()
        {
            khoList.DataSource = KhoDAO.Instance.GetListKho();

        }
        void LoadListTable()
        {
            tableList.DataSource = TableDAO.Instance.LoadTableList();
        }
        void AddFoodBinding()
        {
            
            txtFoodName.DataBindings.Add(new Binding("Text", dtgvFood.DataSource, "Name",true,DataSourceUpdateMode.Never));
            txtIDFood.DataBindings.Add(new Binding("Text", dtgvFood.DataSource, "ID", true, DataSourceUpdateMode.Never));
            nmPrice.DataBindings.Add(new Binding("Value", dtgvFood.DataSource, "Price", true, DataSourceUpdateMode.Never));
        }
        void AddKhoBinding()
        {

            txtAdd.DataBindings.Add(new Binding("Text", dtgvKho.DataSource, "Name", true, DataSourceUpdateMode.Never));
            txtID.DataBindings.Add(new Binding("Text", dtgvKho.DataSource, "ID", true, DataSourceUpdateMode.Never));
            nmSoLuong.DataBindings.Add(new Binding("Value", dtgvKho.DataSource, "soluong", true, DataSourceUpdateMode.Never));
        }
       void AddTableBinding()
        {
            
           txtTableName.DataBindings.Add(new Binding("Text", dtgvTable.DataSource, "name", true, DataSourceUpdateMode.Never));
           txtTableId.DataBindings.Add(new Binding("Text", dtgvTable.DataSource, "id", true, DataSourceUpdateMode.Never));
           
        }
        void AddAccountBinding()
        {
            txtAccountName.DataBindings.Add(new Binding("Text", dtgvAccount.DataSource, "UserName", true, DataSourceUpdateMode.Never));
            txtAccountNameShow.DataBindings.Add(new Binding("Text", dtgvAccount.DataSource, "DisplayName", true, DataSourceUpdateMode.Never));
            nmAccountType.DataBindings.Add(new Binding("Value", dtgvAccount.DataSource, "Type", true, DataSourceUpdateMode.Never));
            
        }
        void AddCategoryBinding()
        { 
            txtCategoryName.DataBindings.Add(new Binding("Text", dtgvCategory.DataSource, "Name", true, DataSourceUpdateMode.Never));
            txtCategoryId.DataBindings.Add(new Binding("Text", dtgvCategory.DataSource, "ID", true, DataSourceUpdateMode.Never));

        }
        void LoadAccount()
        {
            accountList.DataSource = AccountDAO.Instance.GetListAccount();
        }
        
        void LoadCategory()
        {

            categoryList.DataSource = CategoryDAO.Instance.GetListCategory();
        }
        void LoadCategoryInfoCombobox(ComboBox cb)
        {
            cb.DataSource = CategoryDAO.Instance.GetListCategory();
            cb.DisplayMember = "Name";
        }
        void LoadKhoInfoCombobox(ComboBox cb)
        {
            cb.DataSource = KhoDAO.Instance.GetListKho();
            cb.DisplayMember = "Name";
        }

        void AddAccount(string userName, string displayName, int type)
        {
            if (AccountDAO.Instance.InsertAccount(userName, displayName, type))
            {
                MessageBox.Show("Thêm tài khoản thành công");
            }
            else {
                MessageBox.Show("Thêm tài khoản thất bại");
            }
            LoadAccount();
        }
       

        void UpdateAccount(string userName, string displayName, int type)
        {
            if (AccountDAO.Instance.UpdateAccount(userName, displayName, type))
            {
                MessageBox.Show("Cập nhật tài khoản thành công");
            }
            else
            {
                MessageBox.Show("Cập nhật tài khoản thất bại");
            }
            LoadAccount();
        }
        
        void DeleteAccount(string userName)
        {
            if (loginAccount.UserName.Equals(userName))
            {
                MessageBox.Show("Vui lòng đừng xóa chính bạn");
                return;
            }
            if (AccountDAO.Instance.DeleteAccount(userName))
            {
                MessageBox.Show("Xóa tài khoản thành công");
            }
            else
            {
                MessageBox.Show("Xóa tài khoản thất bại");
            }
            LoadAccount();
        }
        void ResetPass(string userName)
        {
            if (AccountDAO.Instance.ResetPassword(userName))
            {
                MessageBox.Show("Đặt lại mật khẩu thành công");
            }
            else
            {
                MessageBox.Show("Đặt lại mật khẩu thất bại");
            }
        }
        #endregion

        #region events
        private void fAdmin_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'QuanLyQuanCafeDataSet2.Kho' table. You can move, or remove it, as needed.
            this.KhoTableAdapter.Fill(this.QuanLyQuanCafeDataSet2.Kho);
            // TODO: This line of code loads data into the 'QuanLyQuanCafeDataSet1.USP_GetListBillByDateForRoport' table. You can move, or remove it, as needed.
            this.USP_GetListBillByDateForRoportTableAdapter.Fill(this.QuanLyQuanCafeDataSet1.USP_GetListBillByDateForRoport, dtpDateFrom.Value, dtpDateTo.Value);
            // TODO: This line of code loads data into the 'QuanLyQuanCafeDataSet.USP_GetTableList' table. You can move, or remove it, as needed.
            this.USP_GetTableListTableAdapter.Fill(this.QuanLyQuanCafeDataSet.USP_GetTableList);

            //this.rpViewer.RefreshReport();
            this.reportViewer1.RefreshReport();
        }

        private void btnAddCategory_Click(object sender, EventArgs e)
        {
            string name = txtCategoryName.Text;
            InsertCategory(name);
            LoadCategoryInfoCombobox(cbFoodCategory);
        }
        private void btnFirst_Click(object sender, EventArgs e)
        {
            txtPage.Text = "1";
        }

        private void btnLast_Click(object sender, EventArgs e)
        {
            int sumRecord = BillDAO.Instance.GetNumBillByDate(dtpDateFrom.Value, dtpDateTo.Value);
            
            int lastPage = sumRecord / 10;
            if (sumRecord % 10 != 0)
                lastPage++;

            txtPage.Text = lastPage.ToString();
        }

        private void txtPage_TextChanged(object sender, EventArgs e)
        {
            dtgvBill.DataSource = BillDAO.Instance.GetListBillByDateAndPage(dtpDateFrom.Value, dtpDateTo.Value, Convert.ToInt32(txtPage.Text));
        }

        private void btnPrevious_Click(object sender, EventArgs e)
        {
            int page = Convert.ToInt32(txtPage.Text);

            if (page > 1)
            {
                page--;
            }
            txtPage.Text = page.ToString();
        }

        private void btnNext_Click(object sender, EventArgs e)
        {
            int page = Convert.ToInt32(txtPage.Text);
            int sumRecord = BillDAO.Instance.GetNumBillByDate(dtpDateFrom.Value, dtpDateTo.Value);
            if (page < sumRecord)
            {
                page++;
            }
            txtPage.Text = page.ToString();
        }
        private void btnResetPassword_Click(object sender, EventArgs e)
        {
            string userName = txtAccountName.Text;
            ResetPass(userName);
        }
        private void btnAddAccount_Click(object sender, EventArgs e)
        {
            string userName = txtAccountName.Text;
            string displayName = txtAccountNameShow.Text;
            int type = (int)nmAccountType.Value;

            AddAccount(userName, displayName, type);

        }

        private void btnDeleteAccount_Click(object sender, EventArgs e)
        {
            string userName = txtAccountName.Text;
          

            DeleteAccount(userName);
        }

        private void btnEditAccount_Click(object sender, EventArgs e)
        {
            string userName = txtAccountName.Text;
            string displayName = txtAccountNameShow.Text;
            int type = (int)nmAccountType.Value;

            UpdateAccount(userName, displayName, type);
        }

        private void btnSearchFood_Click(object sender, EventArgs e)
        {
            fooList.DataSource = SearchFoodByName(txtSearchFoodName.Text);
        }

        private void btnShowAccount_Click(object sender, EventArgs e)
        {
            LoadAccount();
        }
        private void btnBill_Click(object sender, EventArgs e)
        {
            LoadListBillByDate(dtpDateFrom.Value, dtpDateTo.Value);
        }
        private void btnShowFood_Click(object sender, EventArgs e)
        {
            LoadListFood();
        }
        private void txtIDFood_TextChanged(object sender, EventArgs e)
        {
            try
            {
                if (dtgvFood.SelectedCells.Count > 0)
                {
                    int id = (int)dtgvFood.SelectedCells[0].OwningRow.Cells["CategoryID"].Value;
                    Category category = CategoryDAO.Instance.GetCategoryByID(id);
                    cbFoodCategory.SelectedItem = category;

                    int index = 1;
                    int i = 0;

                    foreach (Category item in cbFoodCategory.Items)
                    {
                        if (item.ID == category.ID)
                        {
                            index = i;
                            break;
                        }
                        i++;
                    }
                    cbFoodCategory.SelectedIndex = index;
                }
            }
            catch{}
        }
        

        private void btnAddFood_Click(object sender, EventArgs e)
        {
            string name = txtFoodName.Text;
            int categoryID = (cbFoodCategory.SelectedItem as Category).ID;
            float price = (float)nmPrice.Value;
            string query = string.Format("select * from dbo.Food where name =N'{0}'",name);
            int r = DataProvider.Instance.ExecuteNonQuery(query);
            if (r > 0)
            {
                MessageBox.Show("Món đã tồn tại");
                return;
            }
            else
            {
                if (FoodDAO.Instance.InsertFood(name, categoryID, price))
                {
                    MessageBox.Show("Thêm món thành công");
                    LoadListFood();
                    if (insertFood != null)
                        insertFood(this, new EventArgs());
                }
                else
                {
                    MessageBox.Show("Có lỗi khi thêm thức ăn");
                }
            }
        }

        private void btnEditFood_Click(object sender, EventArgs e)
        {
            string name = txtFoodName.Text;
            int categoryID = (cbFoodCategory.SelectedItem as Category).ID;
            float price = (float)nmPrice.Value;
            int id = Convert.ToInt32(txtIDFood.Text);

            if (FoodDAO.Instance.UpdateFood(id,name, categoryID, price))
            {
                MessageBox.Show("Sửa món thành công");
                LoadListFood();
                if (updateFood != null)
                    updateFood(this, new EventArgs());
            }
            else
            {
                MessageBox.Show("Có lỗi khi sửa thức ăn");
            }
        }

        private void btnDeleteFood_Click(object sender, EventArgs e)
        {
            int id = Convert.ToInt32(txtIDFood.Text);
            if (FoodDAO.Instance.DeleteFood(id))
            {
                MessageBox.Show("Xóa món thành công");
                LoadListFood();
                if (deleteFood != null)
                    deleteFood(this, new EventArgs());
            }
            else
            {
                MessageBox.Show("Có lỗi khi xóa thức ăn");
            }


        }

        private event EventHandler insertFood;
        public event EventHandler InsertFood
        {
            add { insertFood += value;}
            remove {insertFood -= value;}
         }
        private event EventHandler insertKho;
        public event EventHandler InsertKho
        {
            add { insertKho += value; }
            remove { insertKho -= value; }
        }
        private event EventHandler deleteFood;
        public event EventHandler DeleteFood
        {
            add { deleteFood += value; }
            remove { deleteFood -= value; }
        }
        private event EventHandler deleteKho;
        public event EventHandler DeleteKho
        {
            add { deleteKho += value; }
            remove { deleteKho -= value; }
        }
        private event EventHandler updateFood;
        public event EventHandler UpdateFood
        {
            add { updateFood += value; }
            remove { updateFood -= value; }
        }
        private event EventHandler updateKho;
        public event EventHandler UpdateKho
        {
            add { updateKho += value; }
            remove { updateKho -= value; }
        }
        private void btnDeleteCategory_Click(object sender, EventArgs e)
        {
            int id = Convert.ToInt32(txtCategoryId.Text);
            DeleteCategory(id);
        }

        private void btnEditCategory_Click(object sender, EventArgs e)
        {



            string name = txtCategoryName.Text;
            int id = Convert.ToInt32(txtCategoryId.Text);
            UpdateCategory(name, id);
        }

        private void btnAddTable_Click(object sender, EventArgs e)
        {
            string name = txtTableName.Text;
            string status = cbTableStatus.SelectedItem.ToString();
           
            InsertTable(name, status);
        }

        private void btnDeleteTable_Click(object sender, EventArgs e)
        {
            int id = Convert.ToInt32(txtTableId.Text);
            DeleteTable(id);
        }

        private void btnEditTable_Click(object sender, EventArgs e)
        {


            string name = txtTableName.Text;
            string status = cbTableStatus.SelectedItem.ToString();
            int id = Convert.ToInt32(txtTableId.Text);

            UpdateTable(name, status, id);
        }

        private void btnShowTable_Click(object sender, EventArgs e)
        {
            LoadListTable();
        }
        #endregion

        private void button2_Click(object sender, EventArgs e)
        {
            string name = txtAdd.Text;
            float soluong = (float)nmSoLuong.Value;

            if (KhoDAO.Instance.InsertKho(name, soluong))
            {
                MessageBox.Show("Thêm nguyên liệu thành công");
                LoadListKho();
                reportViewer1.RefreshReport();
                LoadKhoInfoCombobox(cbTru);
                if (insertKho != null)
                    insertKho(this, new EventArgs());
            }
            else
            {
                MessageBox.Show("Có lỗi khi thêm nguyên liệu");
            }
            
        }

        private void button1_Click(object sender, EventArgs e)
        {

            int idCategoKho = (cbTru.SelectedItem as Kho).ID;
            float soluong1 = (float)mnTru.Value;
           
            

            if (KhoDAO.Instance.UpdateKho( idCategoKho,soluong1))
            {
                MessageBox.Show("Cập nhật nguyên liệu thành công");
                LoadListKho();
                LoadKhoInfoCombobox(cbTru);
                reportViewer1.RefreshReport();
                if (updateKho != null)
                    updateFood(this, new EventArgs());
            }
            else
            {
                MessageBox.Show("Có lỗi khi sửa nguyên liệu");
            }
        }

        private void btnXoa_Click(object sender, EventArgs e)
        {
            int id = Convert.ToInt32(txtID.Text);
            if (KhoDAO.Instance.DeleteKho(id))
            {
                MessageBox.Show("Xóa nguyên thành công");
                LoadListKho();
                reportViewer1.RefreshReport();
                LoadKhoInfoCombobox(cbTru);
                if (deleteKho != null)
                    deleteKho(this, new EventArgs());
            }
            else
            {
                MessageBox.Show("Có lỗi khi xóa thức ăn");
            }
        }

       

        

      

        

     
       








    }
}
