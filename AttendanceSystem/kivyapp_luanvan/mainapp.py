from kivymd.app import MDApp
from kivy.lang import Builder
from kivy.core.window import Window
from kivymd.uix.behaviors import FakeRectangularElevationBehavior
from kivymd.uix.floatlayout import MDFloatLayout
from kivymd.theming import ThemableBehavior
from kivy.uix.boxlayout import BoxLayout
from kivymd.uix.list import OneLineListItem, MDList, TwoLineListItem, ThreeLineListItem
import mysql.connector
from kivymd.uix.dialog import MDDialog
import hashlib
from datetime import datetime, timedelta
import datetime
import time
import threading
from kivymd.uix.button import MDFloatingActionButton, MDFlatButton
from kivymd.uix.datatables import MDDataTable
from kivy.metrics import dp
from kivymd.uix.pickers import MDDatePicker
Window.size = (310, 580)

kv = """
#:import NoTransition kivy.uix.screenmanager.NoTransition
MDScreen:
    ScreenManager:
        id: screen_root
        MDScreen:
            id: screen_login
            name: 'screen_login'
            MDCard:
                size_hint: None, None
                size: 300, 400
                pos_hint: {"center_x": 0.5, "center_y": 0.5}
                elevation: 10
                padding: 25
                spacing: 25
                orientation: 'vertical'

                MDLabel:
                    id: welcome_label
                    text: "WELCOME"
                    font_size: 40
                    halign: 'center'
                    size_hint_y: None
                    height: self.texture_size[1]
                    padding_y: 15

                MDTextFieldRound:
                    id: user
                    hint_text: "username"
                    icon_right: "account"
                    size_hint_x: None
                    width: 200
                    font_size: 18
                    pos_hint: {"center_x": 0.5}

                MDTextFieldRound:
                    id: password
                    hint_text: "password"
                    icon_right: "eye-off"
                    size_hint_x: None
                    width: 200
                    font_size: 18
                    pos_hint: {"center_x": 0.5}
                    password: True

                MDRoundFlatButton:
                    text: "LOG IN"
                    font_size: 12
                    pos_hint: {"center_x": 0.5}
                    on_press: app.logger()

                MDRoundFlatButton:
                    text: "CLEAR"
                    font_size: 12
                    pos_hint: {"center_x": 0.5} 
                    on_press: app.clear()           

                Widget:
                    size_hint_y: None
                    height: 10
        MDScreen:
            id: mainscreen
            name: "mainscreen"
            MDFloatLayout:
                md_bg_color: 1, 1, 1, 1
                   
                
                ScreenManager:
                    id: scr
                    transition: NoTransition()
                    MDScreen:
                        name: "home"
                        MDToolbar:
                            pos_hint: {"center_y":.95}
                            title: 'Home'
                        MDLabel:
                            id: home_label
                            markup: True
                            pos_hint: {"center_y": .8}
                            halign: "center"
                            font_size: 50
                        MDLabel:
                            id: home_label2
                            markup: True
                            pos_hint: {"center_y": .7}
                            halign: "center"
                        Image:
                            id: home_image
                            pos_hint: {"center_y": .4}
                            size_hint: (1,1)
                            source: "attendance-management-main-slider.png"
                        
                    MDScreen:
                        name: "search"
                        MDToolbar:
                            pos_hint: {"center_y":.95}
                            title: 'Notice'
                        MDLabel:
                            id: search
                            pos_hint: {"center_y": .5}
                            halign: "center"
                        BoxLayout:
                            ScrollView:
                                size_hint: 0.5,0.73
                                pos_hint: {"center_y": .53}
                                MDList:
                                    id: container
                    MDScreen:
                        name: "home1"
                        id: home1
                        MDToolbar:
                            pos_hint: {"center_y":.95}
                            title: 'Attendance Report'
                        MDLabel:
                            id: label_att
                            pos_hint: {"center_y": .5}
                            halign: "center"
        
                        MDFloatingActionButton:
                            icon: 'calendar'
                            pos_hint: {'center_x': .85, 'center_y': .838}
                            on_release: app.show_date_picker()
                        MDLabel:
                            id: date_label
                            # text: "2021-12-08 - 2021-12-10"
                            pos_hint: {'center_x': .6, 'center_y': .85}
                        # BoxLayout:
                        #     ScrollView: 
                        #         MDDataTable:
                        #             id: table
                        #             pos_hint: {'center_x': 0.5, 'center_y': 0.5}
                        #             size_hint: 0.9, 0.6
                        #             check:True
                        #             rows_num:10
                        #             column_data :[("No.", dp(18)),("Food", dp(20)),("Calories", dp(20))]
                    MDScreen:
                        name: "search1"
                        MDToolbar:
                            pos_hint: {"center_y":.95}
                            title: 'Menu'
                        BoxLayout:
                            orientation: 'vertical'
                            padding: "8dp"
                            spacing: "8dp"
                            size_hint: 1,0.8
                            pos_hint: {"center_y": .5}
                            Image:
                                id: avatar
                                size_hint: (1,1)
                                source: "user.jpg"
                            # MDLabel:
                            #     text: "Attreya"
                            #     font_style: "Subtitle1"
                            #     size_hint_y: None
                            #     height: self.texture_size[1]
                            # MDLabel:
                            #     text: "attreya01@gmail.com"
                            #     size_hint_y: None
                            #     font_style: "Caption"
                            #     height: self.texture_size[1]
                            ScrollView:  
                                MDList:
                                    OneLineIconListItem:
                                        on_release: app.s()
                                        text: "Profile"  
                                        IconLeftWidget:                     
                                            icon: "account"      
                                    # OneLineIconListItem:
                                    #     on_release: print("done")
                                    #     text: "Upload"
                                    #     IconLeftWidget:
                                    #         icon: "upload"                       
                                    OneLineIconListItem:
                                        on_release: app.logout()
                                        id: item
                                        text: "Log Out"
                                        IconLeftWidget:
                                            icon: "logout"
                    MDScreen:
                        name: "event"
                        id: event
                        MDToolbar:
                            pos_hint: {"center_y":.95}
                            title: 'Event Report'
                        MDLabel:
                            id: label_ev
                            pos_hint: {"center_y": .5}
                            halign: "center"

                    MDScreen: 
                        name: "info"
                        MDToolbar:
                            pos_hint: {"center_y":.95}
                            title: 'User Profile'
                            left_action_items: [["arrow-left-drop-circle", lambda x: app.back()]]
                        BoxLayout:
                            orientation: 'vertical'
                            padding: "8dp"
                            spacing: "8dp"
                            size_hint: 1,0.8
                            pos_hint: {"center_y": .5}
                            Image:
                                id: a
                                size_hint: (0.5,1)
                                pos_hint: {"center_x": .5}
                                source: "user.jpg"
                            ScrollView:
                                MDList:
                                    TwoLineListItem:
                                        id: text_info1
                                        text: "ID"
                                        markup: True
                                    TwoLineListItem:
                                        id: text_info2
                                        text: "Name"
                                        markup: True
                                    TwoLineListItem:
                                        id: text_info3
                                        text: "Address"
                                        markup: True
                                    TwoLineListItem:
                                        id: text_info4
                                        text: "Sex"
                                        markup: True
                                    TwoLineListItem:
                                        id: text_info5
                                        text: "Birthday"
                                        markup: True

                                        
                
                NavBar:
                    size_hint: .85, .1
                    pos_hint: {"center_x": .5, "center_y": .1}
                    elevation: 10
                    md_bg_color: 1,1,1,1
                    radius: [16]
                    MDGridLayout:
                        cols: 5
                        size_hint_x: .9
                        spacing: 9
                        pos_hint: {"center_x": .5, "center_y": .5}
                        MDIconButton:
                            id: nav_icon1
                            icon: "home"
                            ripple_scale: 0
                            user_font_size: "20sp"
                            theme_text_color: "Custom"
                            text_color: "#0080ff"
                            on_release:
                                scr.current = "home"
                                app.change_color(self)
                        MDIconButton:
                            id: nav_icon2
                            icon: "calendar-month"
                            ripple_scale: 0
                            user_font_size: "20sp"
                            theme_text_color: "Custom"
                            text_color: 0,0,0,1
                            on_release:
                                scr.current = "home1"
                                app.change_color(self)
                                app.attendance()
                        MDIconButton:
                            id: nav_icon3
                            icon: "format-list-text"
                            ripple_scale: 0
                            user_font_size: "20sp"
                            theme_text_color: "Custom"
                            text_color: 0,0,0,1
                            on_release:
                                scr.current = "event"
                                app.change_color(self)
                                app.event()
                        MDIconButton:
                            id: nav_icon4
                            icon: "bell-outline"
                            ripple_scale: 0
                            user_font_size: "20sp"
                            theme_text_color: "Custom"
                            text_color: 0,0,0,1
                            on_release:
                                scr.current = "search"
                                app.change_color(self)
                                app.notice_press()
                        MDIconButton:
                            id: nav_icon5
                            icon: "menu"
                            ripple_scale: 0
                            user_font_size: "20sp"
                            theme_text_color: "Custom"
                            text_color: 0,0,0,1
                            on_release:
                                scr.current = "search1"
                                app.change_color(self)
                                app.profile()
                        

"""
class NavBar(FakeRectangularElevationBehavior, MDFloatLayout):
    pass
class DrawerList(ThemableBehavior, MDList):
    pass
class ContentNavigationDrawer(BoxLayout):
    pass

class AttendanceApp(MDApp):
    def build(self):
        self.theme_cls.primary_palette = "Blue"
        return Builder.load_string(kv)
    def change_color(self, instance):
        if instance in self.root.ids.values():
            current_id = list(self.root.ids.keys())[list(self.root.ids.values()).index(instance)]
            for i in range(5):
                if f"nav_icon{i+1}" == current_id:
                    self.root.ids[f"nav_icon{i+1}"].text_color = "#0080ff"
                else:
                    self.root.ids[f"nav_icon{i+1}"].text_color = 0, 0, 0, 1
    def notice_press(self):
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )
        mycursor = mydb.cursor()

        sql_login = "SELECT EmployeeID FROM tblemployee WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
        m = hashlib.sha1(self.root.ids.password.text.encode())
        strpass = m.hexdigest()
        val_login = (self.root.ids.user.text,strpass)
        mycursor.execute(sql_login, val_login)
        myresult = mycursor.fetchone()
        string_id = str(myresult[0])
        # sql_n = "SELECT * FROM tblnotification WHERE EmployeeID = %s"
        # val_n = ('62932520')
        sql = "SELECT notificationTime, notificationDate FROM tblnotification WHERE EmployeeID =%s AND notification_status = %s order by notificationID Desc"
        val =(string_id, "No Active")
        mycursor.execute(sql, val)
        myres_notice = mycursor.fetchall()

        e=0
        for x in myres_notice:
            e+=1
        if e>0:
            for x in myres_notice:
                x = ' '.join(x)
                e+=1
                item = ThreeLineListItem(text='Successful Checking', secondary_text ='You have checked at '+str(x[0:9]),tertiary_text = str(x[9:20]))
                self.root.ids.container.add_widget(item)
        # else:
        #     self.root.ids.search.text = "No Notice"
        # sql_2 = "UPDATE tblnotification SET notification_status = %s WHERE EmployeeID = %s AND notification_status = %s"
        # val_2 =("No Use", string_id, "No Active",)
        # mycursor.execute(sql_2, val_2)
        # mydb.commit()
        
    def logger(self):
        # self.root.ids.welcome_label.text = f'Sup {self.root.ids.user.text}!'
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )

        mycursor = mydb.cursor()
        sql_login = "SELECT ACCOUNT_USERNAME, ACCOUNT_PASSWORD FROM tblemployee WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
        m = hashlib.sha1(self.root.ids.password.text.encode())
        strpass = m.hexdigest()
        val_login = (self.root.ids.user.text,strpass)
        mycursor.execute(sql_login, val_login)

        myresult = mycursor.fetchone()
        

        print(strpass)
        
        if self.root.ids.user.text == "" or self.root.ids.password.text == "":
            user_error = "Please enter your username and password."
            self.root.ids.screen_root.current = 'screen_login'

        elif myresult == None:
            user_error = self.root.ids.user.text + " user does not exist."
            self.root.ids.screen_root.current = 'screen_login'
            self.clear()
        else:
            user_error = "Successfully!"
            self.root.ids.screen_root.current = 'mainscreen'
            self.notification()
            self.clock()

        self.dialog = MDDialog(title='Username check',
                               size_hint=(0.8, 1),text=user_error,
                               buttons=[MDFlatButton(text='Close', on_release=self.close_dialog)]
                               )
        
        self.dialog.open()

    def clear(self):
        self.root.ids.welcome_label.text = "WELCOME"        
        self.root.ids.user.text = ""        
        self.root.ids.password.text = "" 
    def close_dialog(self, obj):
        self.dialog.dismiss()     
    def notification(self):
        th = threading.Timer(2.0, self.notification)
        th.start()
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )
        mycursor = mydb.cursor()
        sql_login = "SELECT EmployeeID FROM tblemployee WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
        m = hashlib.sha1(self.root.ids.password.text.encode())
        strpass = m.hexdigest()
        val_login = (self.root.ids.user.text,strpass)
        mycursor.execute(sql_login, val_login)

        myresult = mycursor.fetchone()
        if myresult == None:
            th.join()
        e=0
        for y in myresult:
            e+=1
            # print(e)
        if e >0: 
            now = datetime.datetime.now()
            dtStringtime = now.strftime('%H:%M')
            # print(myresult[0])
            # myresult_s = ''.join(myresult)
            sql_notifi = "SELECT * FROM tblnotification WHERE EmployeeID = %s AND notification_status = %s AND notificationID =  (SELECT max(notificationID) from tblnotification) "
            val_notifi =(myresult[0], 'Active')
            mycursor.execute(sql_notifi, val_notifi)
            myre_noti = mycursor.fetchall()
            i=0
            for x in myre_noti:
                i+=1
            # print(i)
            if i >0: 
                import plyer
                plyer.notification.notify(title='Attendance notice', message="You checking at "+dtStringtime)
                sql_notifi_update = "UPDATE tblnotification SET notification_status = %s WHERE EmployeeID = %s"
                val_notifi_update =('No Active',myresult[0], )
                mycursor.execute(sql_notifi_update, val_notifi_update)
                mydb.commit()
    def clock(self):
        thr = threading.Timer(1.0, self.clock)
        thr.start()
        hour = time.strftime("%H")
        minute = time.strftime("%M")
        second = time.strftime("%S")
        weekday = time.strftime("%A")
        day = time.strftime("%d")
        month = time.strftime("%B")
        year = time.strftime("%Y")
        am_pm = time.strftime("%p")
    
        self.root.ids.home_label.text = "[b]"+hour + ":" + minute + ":" + second+ " "+am_pm+"[/b]"
        self.root.ids.home_label2.text= "[i]"+weekday + "," + month+" "+ day + "," +year+"[/i]"
    def profile(self):
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )
        mycursor = mydb.cursor()
        sql_login = "SELECT EmployeeID FROM tblemployee WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
        m = hashlib.sha1(self.root.ids.password.text.encode())
        strpass = m.hexdigest()
        val_login = (self.root.ids.user.text,strpass)
        mycursor.execute(sql_login, val_login)
        myresult = mycursor.fetchone()

        mycursor.execute("SELECT StudPhoto FROM tblemployee WHERE EmployeeID ="+myresult[0])
        myresult_av = mycursor.fetchone()
        # print(myresult_av[0])
        if myresult_av[0] != '':
            self.root.ids.avatar.source = "D:/BaiTapCuaTui/LuanVan/attendancemonitoring/student/"+myresult_av[0]
        
    def attendance(self):
        # super().attendance()
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )
        mycursor = mydb.cursor()

        sql_login = "SELECT EmployeeID FROM tblemployee WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
        m = hashlib.sha1(self.root.ids.password.text.encode())
        strpass = m.hexdigest()
        val_login = (self.root.ids.user.text,strpass)
        mycursor.execute(sql_login, val_login)
        myresult = mycursor.fetchone()
        string_id = str(myresult[0])
        
        sql = "SELECT AttendDate FROM tbltimetable WHERE EmployeeID =%s AND EventTitle = %s"
        val = (string_id, "Daily Attendance")
        mycursor.execute(sql,val)
        myres_notice = mycursor.fetchall()


        str_day = self.root.ids.date_label.text[0:10]
        str_day2 = self.root.ids.date_label.text[13:23]
        print(str_day2)
        if str_day =='' or str_day2 =='':
            self.root.ids.label_att.text = "Please Select The Date Range"
        else:
            day2 = datetime.datetime.strptime(str_day2, '%Y-%m-%d').date()
            day = datetime.datetime.strptime(str_day, '%Y-%m-%d').date()
            days = datetime.timedelta(1)    
            data_att = []
            e=0
            f = 1
            for x in myres_notice:
                e+=1
            if e>0:
                for x in myres_notice:
                    if x[0] >= day and x[0]<=day2:
                        data_att.append((f,x[0],"Present"))
                        f+=1
                        while day<x[0]:
                            data_att.append((f,day,"Absent"))
                            day = day + days
                            f+=1
                        day = x[0]+days
                while day<=day2:

                    data_att.append((f,day,"Absent"))
                    day = day + days
                    f+=1
                # day = day+days
                # while day<=day2+days:
                #     data_att.append((f,day,"Absent"))
                #     day = day + days
                #     f+=1
                    
                   
                data_table = MDDataTable(pos_hint={'center_x': 0.5, 'center_y': 0.48},
                                     size_hint=(0.9, 0.6),
                                     check=False,
                                     rows_num=31,
                                     column_data=[
                                         ("No.", dp(10)),
                                         ("Date", dp(20)),
                                         ("Status", dp(20))
                                     ],
                                     row_data=data_att
                                     ) 
                self.root.ids.home1.add_widget(data_table)
                data_table.bind(on_row_press=self.on_row_press)
                data_table.bind(on_check_press=self.on_check_press)         
            else:
                while day<=day2:
                    data_att.append((f,day,"Absent"))
                    day = day + days
                    f+=1
                data_table = MDDataTable(pos_hint={'center_x': 0.5, 'center_y': 0.48},
                                     size_hint=(0.9, 0.6),
                                     check=False,
                                     rows_num=31,
                                     column_data=[
                                         ("No.", dp(10)),
                                         ("Date", dp(20)),
                                         ("Status", dp(20))
                                     ],
                                     row_data=data_att
                                     ) 
                self.root.ids.home1.add_widget(data_table)
        
         
        
    def on_row_press(self, instance_table, instance_row):
        print(instance_table, instance_row)

    def on_check_press(self, instance_table, current_row):
        print(instance_table, current_row)
    def on_save (self, instance, value, date_range):
        self.root.ids.date_label.text = f'{str(date_range[0])} - {str(date_range[-1])}'
        self.attendance()
    # Cancel  
    def on_cancel(self, instance, value):
        self.root.ids.date_label.text = "You Clicked Cancel!"


    def show_date_picker(self):
        from datetime import datetime

        # Define default time
        # default_time = datetime.strptime("4:20:00", '%H:%M:%S').time()

        time_dialog = MDDatePicker(mode = "range")
        # Set default Time
        # time_dialog.set_time(default_time)
        time_dialog.bind(on_cancel=self.on_cancel, on_save=self.on_save)
        time_dialog.open()
    def logout(self):
        # threading.Thread(target=self.notification).daemon = True
        self.root.ids.screen_root.current = "screen_login"
        self.clear()
    def s(self):
        self.root.ids.scr.current = "info"
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )
        mycursor = mydb.cursor()

        sql_login = "SELECT EmployeeID FROM tblemployee WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
        m = hashlib.sha1(self.root.ids.password.text.encode())
        strpass = m.hexdigest()
        val_login = (self.root.ids.user.text,strpass)
        mycursor.execute(sql_login, val_login)
        myresult = mycursor.fetchone()
        string_id = str(myresult[0])
        mycursor.execute("SELECT EmployeeID, Middlename, Lastname, Firstname, Address, Gender, BirthDate, StudPhoto FROM tblemployee WHERE EmployeeID="+string_id)
        profile = mycursor.fetchone()
        
        print(profile[0])
        self.root.ids.text_info1.secondary_text = profile[0]
        self.root.ids.text_info2.secondary_text = profile[1]+' '+profile[2]+' '+profile[3]
        self.root.ids.text_info3.secondary_text = profile[4]
        self.root.ids.text_info4.secondary_text = profile[5]
        self.root.ids.text_info5.secondary_text = profile[6].strftime("%d-%m-%Y")
        if profile[7]!= '':
            self.root.ids.a.source = "D:/BaiTapCuaTui/LuanVan/attendancemonitoring/student/"+profile[7]
    def back(self):
          self.root.ids.scr.current = "search1"
    def event(self):
        self.root.ids.scr.current = "event"
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )
        mycursor = mydb.cursor()

        sql_login = "SELECT EmployeeID FROM tblemployee WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
        m = hashlib.sha1(self.root.ids.password.text.encode())
        strpass = m.hexdigest()
        val_login = (self.root.ids.user.text,strpass)
        mycursor.execute(sql_login, val_login)
        myresult = mycursor.fetchone()
        string_id = str(myresult[0])

        mycursor.execute("SELECT EventTitle FROM tbltimetable WHERE EmployeeID = "+ string_id)
        list_ev = mycursor.fetchall()

        mycursor.execute("SELECT EventTitle FROM tblevents except SELECT EventTitle FROM tbltimetable WHERE EmployeeID = "+ string_id)
        list_ev_name = mycursor.fetchall()
        print(list_ev_name)
        f=1
        data_att = []
        
        for y in list_ev_name:
            data_att.append((f,y[0],"Absent"))
            print(y[0])
            f+=1
        for x in list_ev:
            if x[0] != "Daily Attendance":
                data_att.append((f,x[0],"Present"))
                f+=1
        # data_att.append((1,"V","Absent"))
        data_table = MDDataTable(pos_hint={'center_x': 0.5, 'center_y': 0.5},
                                     size_hint=(1, 0.8),
                                     check=False,
                                     rows_num=31,
                                     column_data=[
                                         ("No.", dp(10)),
                                         ("Event", dp(30)),
                                         ("Status", dp(30))
                                     ],
                                     row_data=data_att
                                     ) 
        self.root.ids.event.add_widget(data_table)
                
        
if __name__== "__main__":
    AttendanceApp().run()