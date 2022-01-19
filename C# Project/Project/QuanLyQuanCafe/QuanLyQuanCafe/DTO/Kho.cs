using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace QuanLyQuanCafe.DTO
{
    public class Kho
    {
        public Kho(int iD, string name, float soLuong)
        {
            this.ID = iD;
            this.Name = name;
            this.SoLuong = soLuong;
        }
        public Kho(DataRow row)
        {
            this.ID = (int)row["id"];
            this.Name = row["name"].ToString();
            this.SoLuong = (float)Convert.ToDouble(row["soluong"].ToString());

        }

        private float soLuong;

        public float SoLuong
        {
            get { return soLuong; }
            set { soLuong = value; }
        }
        private string name;

        public string Name
        {
            get { return name; }
            set { name = value; }
        }

        private int iD;

        public int ID
        {
            get { return iD; }
            set { iD = value; }
        }
    }
}
