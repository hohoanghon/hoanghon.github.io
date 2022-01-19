using QuanLyQuanCafe.DAO;
using QuanLyQuanCafe.DTO;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QuanLyQuanCafe
{
    public partial class fAccountProfile : Form
    {
        private Account loginAccount;

        public Account LoginAccount
        {
            get { return loginAccount; }
            set { loginAccount = value; }
        }
        public fAccountProfile(Account acc)
        {
            InitializeComponent();
            
            loginAccount = acc;
            ChangeAccount(loginAccount);
        }
        void ChangeAccount(Account acc)
        {
            txtUserName.Text = loginAccount.UserName;
            txtDisplayName.Text = loginAccount.DisplayName;
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            this.Close();
        }
        void UpdateAccountInfo()
        {
            string displayName = txtDisplayName.Text;
            string password = txtPassWord.Text;
            string newPass = txtNewPass.Text;
            string reenterPass = txtReEnterPass.Text;
            string userName = txtUserName.Text;

            if (!newPass.Equals(reenterPass))
            {
                MessageBox.Show("Vui lòng nhập lại mật khẩu đúng với mật khẩu mới ");
            }
            else
            {
                if (AccountDAO.Instance.UpdateAccount(userName, displayName, password, newPass)) 
                {
                    MessageBox.Show("Cập nhật thành công");
                    if (updateAcount != null)
                        updateAcount(this, new AccountEvent(AccountDAO.Instance.GetAccountByUserName(userName)));
                }
                else
                {
                    MessageBox.Show("Vui lòng điền đúng mật khẩu");
                }
            }
        }
        private event EventHandler<AccountEvent> updateAcount;
        public event EventHandler<AccountEvent> UpdateAcount
        {
            add { updateAcount += value; }
            remove { updateAcount -= value; }
         }
        private void btnUpdate_Click(object sender, EventArgs e)
        {
            UpdateAccountInfo();
        }
       
    }
    public class AccountEvent : EventArgs
    {
        private Account acc;

        public Account Acc
        {
            get { return acc; }
            set { acc = value; }
        }
        public AccountEvent(Account acc)
        {
            this.Acc = acc;

        }
    }
}
