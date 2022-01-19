from kivymd.app import MDApp
from kivy.lang import Builder
from kivy.core.window import Window
from kivy.uix.boxlayout import BoxLayout
from kivymd.theming import ThemableBehavior
from kivymd.uix.list import MDList
from kivy.uix.screenmanager import Screen,ScreenManager
from kivy.uix.floatlayout import FloatLayout
from kivymd.uix.tab import MDTabsBase
from kivymd.uix.button import MDFloatingActionButton, MDFlatButton
import mysql.connector
from kivymd.uix.dialog import MDDialog
import hashlib
import datetime
import time
import threading
from kivymd.uix.screen import Screen
from kivymd.uix.list import OneLineListItem, MDList, TwoLineListItem, ThreeLineListItem
from kivymd.uix.list import OneLineIconListItem, IconLeftWidget
from kivy.uix.scrollview import ScrollView

from navigation_drawer import navigation_helper

Window.size = (300, 500)




# class MenuScreen(Screen):
#     pass


# class ProfileScreen(Screen):
#     pass


# class UploadScreen(Screen):
#     pass

    
# Create the screen manager
# sm = ScreenManager()
# sm.add_widget(MenuScreen(name='menu'))
# sm.add_widget(ProfileScreen(name='profile'))
# sm.add_widget(UploadScreen(name='upload'))

class DemoApp(MDApp):
    class ContentNavigationDrawer(BoxLayout):
        pass

    class DrawerList(ThemableBehavior, MDList):
        pass

    # def build(self):
    #     screen = Screen()
    #     self.help_str  = Builder.load_string(navigation_helper)
    #     screen.add_widget(self.help_str)
    #     return screen

    def build(self):
        screen = Builder.load_string(navigation_helper)
        return screen
    def on_tab_switch(self,instance_tabs,instance_tab,instance_tab_label,tab_text):
        pass
    def home_press(self):
        self.root.ids.screen_manager.current = 'home'
        self.notification()
        # seft.ids[str(screen_root)] = weakref.proxy(screen_root)
    def attendance_press(self):
        # print("Navigation")
        self.root.ids.screen_manager.current = 'attendance'
    def event_press(self):
        # print("Navigation")
        self.root.ids.screen_manager.current = 'event'
    def logger(self):
        # self.root.ids.welcome_label.text = f'Sup {self.root.ids.user.text}!'
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )

        mycursor = mydb.cursor()
        sql_login = "SELECT ACCOUNT_USERNAME, ACCOUNT_PASSWORD FROM useraccounts WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
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
            self.root.ids.screen_root.current = 'screen_inapp'
            self.notification()

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
        threading.Timer(5.0, self.notification).start()
        mydb = mysql.connector.connect(
          host="localhost",
          user="root",
          password="",
          database="dbattendance"
        )
        mycursor = mydb.cursor()
        sql_login = "SELECT EmployeeID FROM useraccounts WHERE ACCOUNT_USERNAME = %s AND ACCOUNT_PASSWORD = %s"
        m = hashlib.sha1(self.root.ids.password.text.encode())
        strpass = m.hexdigest()
        val_login = (self.root.ids.user.text,strpass)
        mycursor.execute(sql_login, val_login)

        myresult = mycursor.fetchone()
        e=0
        for y in myresult:
            e+=1
            # print(e)
        if e >0: 
            now = datetime.datetime.now()
            dtStringtime = now.strftime('%H:%M')
            print(myresult[0])
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
                plyer.notification.notify(title='Attendance notice', message="You timed at "+dtStringtime)
                sql_notifi_update = "UPDATE tblnotification SET notification_status = %s WHERE EmployeeID = %s"
                val_notifi_update =('No Active',myresult[0], )
                mycursor.execute(sql_notifi_update, val_notifi_update)
                mydb.commit()
    def notice_press(self):
        self.root.ids.screen_manager.current = 'notice'
        for i in range(20):
            item = OneLineListItem(text='Item ' + str(i))
            self.root.ids.container.add_widget(item)
        
DemoApp().run()