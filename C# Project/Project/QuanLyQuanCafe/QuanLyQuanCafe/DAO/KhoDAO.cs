using QuanLyQuanCafe.DTO;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace QuanLyQuanCafe.DAO
{
    public class KhoDAO
    {
        private static KhoDAO instance;

        public static KhoDAO Instance
        {
            get { if (instance == null) instance = new KhoDAO(); return KhoDAO.instance; }
            private set { KhoDAO.instance = value; }
        }
        private KhoDAO() { }
        
        public List<Kho> GetListKho()
        {
            List<Kho> list = new List<Kho>();
            string query = "SELECT id, name, soluong FROM dbo.Kho ";
            DataTable data = DataProvider.Instance.ExecuteQuery(query);
            foreach (DataRow item in data.Rows)
            {
                Kho food = new Kho(item);
                list.Add(food);
            }
            return list;
        }

        public List<Kho> SearchFoodByName(string name)
        {
            List<Kho> list = new List<Kho>();
            string query = string.Format("SELECT * FROM Kho where name like N'%{0}%'", name);
            DataTable data = DataProvider.Instance.ExecuteQuery(query);
            foreach (DataRow item in data.Rows)
            {
                Kho food = new Kho(item);
                list.Add(food);
            }
            return list;
        }

        public bool InsertKho(string name, float soluong)
        {
            string query = string.Format("insert dbo.Kho(name, soluong) values(N'{0}',{1})", name, soluong);
            int result = DataProvider.Instance.ExecuteNonQuery(query);

            return result > 0;
        }

        public bool UpdateKho( int idCategoryFood, float soluong)
        {
            string query = string.Format("update dbo.Kho set soluong={0} where id ={1}", soluong, idCategoryFood);
            int result = DataProvider.Instance.ExecuteNonQuery(query);

            return result > 0;
        }
        public bool DeleteKho(int id)
        {
            BillInfoDAO.Instance.DeleteBillInfoByFoodID(id);
            string query = string.Format("delete Kho where id = {0}", id);
            int result = DataProvider.Instance.ExecuteNonQuery(query);
            return result > 0;
        }



    }


}
