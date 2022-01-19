from tkinter import *
import tkinter as tk
from tkinter import messagebox
import cv2
import os
from PIL import Image, ImageTk
import numpy as np
import mysql.connector
import datetime
import numpy as np
from pyzbar.pyzbar import decode
import qrcode
import random
from tkinter import ttk
import time


#cua so chinh#########
window=tk.Tk()
window.title("Attendance Checking")
window.resizable(0, 0)
def clock():
	hour = time.strftime("%H")
	minute = time.strftime("%M")
	second = time.strftime("%S")
	weekday = time.strftime("%A")
	day = time.strftime("%d")
	month = time.strftime("%B")
	year = time.strftime("%Y")
	am_pm = time.strftime("%p")
	
	my_label_clock.config(text= hour + ":" + minute + ":" + second+ " "+am_pm)
	my_label_clock.after(1000, clock)

	my_label_clock2.config(text = weekday + "," + month+" "+ day + "," +year)

def update():
	my_label_clock.config(text = "New Text")

frame_title = Frame(window, width = 1500, bg = "#00cc99")
frame_title.grid(columnspan =2,row = 0, column = 0,padx =0, pady = 0, ipadx = 55, ipady = 20)
my_label_clock = Label(frame_title, text = "", font = ("Helvetica", 28), fg = "#e6fff9", bg = "#00cc99")
my_label_clock.grid(column=0, row = 1,ipadx = 0, padx = 200)

my_label_clock2 = Label(frame_title, text = "", font = ("Helvetica", 14), fg = "#e6fff9",bg = "#00cc99")
my_label_clock2.grid(column=1, row = 1,ipadx = 0, padx = 0)
clock()

title_label = Label(frame_title, text = "Attendance Checking", font = ("Helvetica", 48), fg = "#e6fff9", bg = "#00cc99")
title_label.grid(column = 0, row = 0, columnspan = 2, padx = 0,ipadx = 50)

frame_footer = Frame(window,bg = "#00cc99")
frame_footer.grid(row = 3, column=0)
footer_label = Label(frame_footer, text="Ⓒ2021 Attendance System.Ho Hoang Hon. All Rights Reserved.", font = ("Helvetica", 10), fg = "#e6fff9", bg = "#00cc99")
footer_label.grid(column  = 0, row = 0, padx = 0, ipadx = 123, pady = 0, ipady = 30)
footer_label2 = Label(frame_footer, text="Ⓒ2021 Attendance System.Ho Hoang Hon. All Rights Reserved.", font = ("Helvetica", 10), fg = "#00cc99", bg = "#00cc99")
footer_label2.grid(column  = 1, row = 0, padx = 0, ipadx = 0, pady = 0, ipady = 30)

####frame tong#####
frame_root = Frame(window,width =1000 )
frame_root.grid(column = 0, row = 2, padx =10, pady = 20, ipadx = 35, ipady = 0)

frame_event = LabelFrame(window, text = "Event", height = 50, width=100)
frame_event.grid(column = 0, row = 1, padx=10, pady=20, ipadx = 50, ipady=20)

event_label = Label(frame_event, text = "Select Event", font = ("Helvetica", 20))
event_label.grid(column = 0, row=0, padx = 60, pady=25)

mydb=mysql.connector.connect(
            host="localhost",
            user="root",
            passwd="",
            database="dbattendance"

            )
options = []
mycursor=mydb.cursor()
mycursor.execute("SELECT EventTitle FROM tblevents WHERE Status = 'Active' ")
ids = mycursor.fetchall()
for i in ids:
	options.append(i[0])
opts = StringVar();
# opts_s = opts.get()
# opts = "";
mycombo = ttk.Combobox(frame_event, textvariable=opts, width = 20, font = ("Helvetica", 20))
mycombo['value'] = options
mycombo.grid(column = 1, row = 0)
mycombo.current(0)

# frame_em = LabelFrame(window, text = "Employee List", height = 400, width=100)
# frame_em.grid(column = 1, row = 1, rowspan =2, padx = 10, pady=20, ipady = 90)

# tv_em = ttk.Treeview(frame_em, columns=(0,1,2,3,4,6), show="headings", height="5")
# tv_em.grid(column = 0, row = 0)
mydb=mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="",
        database="dbattendance"
        )

# mycursor=mydb.cursor()
# mycursor.execute("SELECT Lastname FROM `tbltimetable` t, `tblemployee` s WHERE t.`EmployeeID`=s.`EmployeeID` ORDER BY TimeTableID desc ")
# result = mycursor.fetchall()
# i=0
# # Create A Canvas
# my_canvas = Canvas(frame_em)
# my_canvas.pack(side=LEFT, fill=BOTH, expand=1)

# # Add A Scrollbar To The Canvas
# my_scrollbar = ttk.Scrollbar(frame_em, orient=VERTICAL, command=my_canvas.yview)
# my_scrollbar.pack(side=RIGHT, fill=Y)

# # Configure The Canvas
# my_canvas.configure(yscrollcommand=my_scrollbar.set)
# my_canvas.bind('<Configure>', lambda e: my_canvas.configure(scrollregion = my_canvas.bbox("all")))

# # Create ANOTHER Frame INSIDE the Canvas
# second_frame = Frame(my_canvas)
# # second_frame.pack()

# # Add that New frame To a Window In The Canvas
# my_canvas.create_window((0,0), window=second_frame, anchor="nw")
# for x in result:
# 	x=''.join(x)
# 	i+=1
# 	print(x)
# 	print(i)
# 	status_label = Label(second_frame, text = x+"Attendance in at\n", font = ("Helvetica", 14), justify=LEFT,borderwidth=2, relief="groove")
# 	status_label.grid(row = i, column = 0,padx = 5,ipadx = 50)
# for x in range(5):
# 	# x=''.join(x)
# 	i+=1
# 	print(x)
# 	print(i)
# 	status_label = Entry(frame_em)
# 	status_label.grid(column = x, row=0, padx = 10, pady=10)

# rows_em = mycursor.fetchall()
# tv_em.heading(0, text="STT")
# tv_em.heading(1, text="Name")
# tv_em.heading(2, text="Status")
# tv_em.heading(3, text="Event")
# tv_em.bind('<Double 1>', getrow)



# drop = OptionMenu(frame_root, clicked, *options)
# drop.grid(column = 0, row = 0)
# my_label_clock.after(5000, update)
# # #Mo cửa sổ mới
# def open():
# 	top = tk.Toplevel(window)
# 	top.title("face")
# 	top.geometry("800x200")
# 	l1=tk.Label(top,text="Name",font=("Algerian",20))
# 	l1.grid(column=0, row=0)
# 	t1=tk.Entry(top,width=50,bd=5)
# 	t1.grid(column=1, row=0)

# 	l2=tk.Label(top,text="Age",font=("Algerian",20))
# 	l2.grid(column=0, row=1)
# 	t2=tk.Entry(top,width=50,bd=5)
# 	t2.grid(column=1, row=1)

# 	l3=tk.Label(top,text="Address",font=("Algerian",20))
# 	l3.grid(column=0, row=2)
# 	t3=tk.Entry(top,width=50,bd=5
# 	t3.grid(column=1, row=2))
# #train model
# 	def train_classifier():
# 	    data_dir="D:/BaiTapCuaTui/LuanVan/face_rec/data"
# 	    path = [os.path.join(data_dir,f) for f in os.listdir(data_dir)]
# 	    faces  = []
# 	    ids   = []
	    
# 	    for image in path:
# 	        img = Image.open(image).convert('L');
# 	        imageNp= np.array(img, 'uint8')
# 	        id = int(os.path.split(image)[1].split(".")[1])
	        
# 	        faces.append(imageNp)
# 	        ids.append(id)
# 	    ids = np.array(ids)
	    
# 	    #Train the classifier and save
# 	    clf = cv2.face.LBPHFaceRecognizer_create()
# 	    clf.train(faces,ids)
# 	    clf.write("classifier.xml")
# 	    messagebox.showinfo('Result','Training dataset completed!!!')
	    
# 	b1=tk.Button(top,text="Training",font=("Algerian",20),bg='orange',fg='red',command=train_classifier)
# 	b1.grid(column=0, row=4)
#nhan dien diem danh
# def detect_face():
#     def draw_boundary(img,classifier,scaleFactor,minNeighbors,color,text,clf):
#         gray_image = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
#         features = classifier.detectMultiScale(gray_image,scaleFactor,minNeighbors)

#         coords = []

#         for(x,y,w,h) in features:
#             cv2.rectangle(img,(x,y),(x+w,y+h),color,2)
#             id,pred = clf.predict(gray_image[y:y+h,x:x+w])
#             confidence = int(100*(1-pred/300))
            
#             mydb=mysql.connector.connect(
#             host="localhost",
#             user="root",
#             passwd="",
#             database="dbattendance"
#             )
#             mycursor=mydb.cursor()
#             mycursor.execute("SELECT Lastname FROM tblemployee WHERE EmployeeID = "+x)
#             s = mycursor.fetchone()
#             s = ''+''.join(s)
            
#             if confidence>74:
#                 cv2.putText(img,s,(x,y-5),cv2.FONT_HERSHEY_SIMPLEX,0.8,color,1,cv2.LINE_AA)
#                 sql_attendance = "INSERT INTO tbltimetable (EmployeeID, TimeInAM) VALUES (%s, %s)"
#                 #xac dinh ngay gio hien tai
#                 now = datetime.datetime.now()
#                 dtStringtime = now.strftime('%H:%M:%S')
#                 # dtStringdate = now.strftime('%Y-%m-%d')
#                 # day = now.strftime('%d')
#                 # month = now.strftime('%m')
#                 # year = now.strftime('%Y')
#                 # intday = int(day)
#                 # intmonth = int(month)
#                 # intyear = int(year)
#                 # print(item['values'][0])
#                 #lay du lieu
#                 mycursor.execute("SELECT * FROM tbltimetable WHERE EmployeeID = "+x)
#                 myresult = mycursor.fetchall()
#                 # x= ''.join(myresult)
#                 # print(x)
#                 # x =datetime.datetime.strptime(myresult, '%H:%M:%S')
#                 print(x)
#                 count = 0
#                 for x in myresult:
#                 	count +=1
#                 if count>0:
#                 	continue
#                 else:
#                 	val_attendance = (id, dtStringtime)
#                 	mycursor.execute(sql_attendance, val_attendance)
#                 	mydb.commit()   
#             else:
#                 cv2.putText(img,"UNKNOWN",(x,y-5),cv2.FONT_HERSHEY_SIMPLEX,0.8,(0,0,255),1,cv2.LINE_AA)

#             coords=[x,y,w,h]
#         return coords
            
#     def recognize(img,clf,faceCascade):
#         coords = draw_boundary(img,faceCascade,1.1,10,(255,255,255),"Face",clf)
#         return img

#     faceCascade=cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
#     clf = cv2.face.LBPHFaceRecognizer_create()
#     clf.read("classifier.xml")

#     video_capture =  cv2.VideoCapture(0)

#     while True:
#         ret,img = video_capture.read()
#         img=  recognize(img,clf,faceCascade)
#         cv2.imshow("face detection",img)

#         if cv2.waitKey(1)==ord('q'):
#             break

#     video_capture.release()
#     cv2.destroyAllWindows()

# b2=tk.Button(top,text="Detect the face",font=("Algerian",20),bg='green',fg='white',command=detect_face)
# b2.grid(column=1, row=4)
# #lay du lieu
# 	def generate_dataset():
# 	    if(t1.get()=="" or t2.get()=="" or t3.get()==""):
# 	        messagebox.showinfo('Result','Please provide complete details of the user')
# 	    else:
# 	        mydb=mysql.connector.connect(
# 	        host="localhost",
# 	        user="root",
# 	        passwd="",
# 	        database="Authorized_user"
# 	        )
# 	        mycursor=mydb.cursor()
# 	        mycursor.execute("SELECT * from my_table")
# 	        myresult=mycursor.fetchall()
# 	        id=1
# 	        for x in myresult:
# 	            id+=1
# 	        sql="insert into my_table(id,Name,Age,Address) values(%s,%s,%s,%s)"
# 	        val=(id,t1.get(),t2.get(),t3.get())
# 	        mycursor.execute(sql,val)
# 	        mydb.commit()
	        
# 	        face_classifier = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
# 	        def face_cropped(img):
# 	            gray  = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
# 	            faces = face_classifier.detectMultiScale(gray,1.3,5)
# 	            #scaling factor=1.3
# 	            #Minimum neighbor = 5

# 	            if faces is ():
# 	                return None
# 	            for(x,y,w,h) in faces:
# 	                cropped_face=img[y:y+h,x:x+w]
# 	            return cropped_face

# 	        cap = cv2.VideoCapture(0)
# 	        img_id=0

# 	        while True:
# 	            ret,frame = cap.read()
# 	            if face_cropped(frame) is not None:
# 	                img_id+=1
# 	                face = cv2.resize(face_cropped(frame),(200,200))
# 	                face  = cv2.cvtColor(face, cv2.COLOR_BGR2GRAY)
# 	                file_name_path = "data/user."+str(id)+"."+str(img_id)+".jpg"
# 	                cv2.imwrite(file_name_path,face)
# 	                cv2.putText(face,str(img_id),(50,50),cv2.FONT_HERSHEY_COMPLEX,1, (0,255,0),2)
# 	                # (50,50) is the origin point from where text is to be written
# 	                # font scale=1
# 	                #thickness=2

# 	                cv2.imshow("Cropped face",face)
# 	                if cv2.waitKey(1)==13 or int(img_id)==200:
# 	                    break
# 	        cap.release()
# 	        cv2.destroyAllWindows()
# 	        messagebox.showinfo('Result','Generating dataset completed!!!')

# 	b3=tk.Button(top,text="Generate dataset",font=("Algerian",20),bg='pink',fg='black',command=generate_dataset)
# 	b3.grid(column=2, row=4)

# 	################
	
# 	b4 = tk.Button(top,text="Back",font=("Algerian",20),bg='blue',command=top.destroy)
# 	b4.grid(column=3,row=4)





#frame_root.place(x=10, y=10)


#fame cua nhan dien khuon mat###############
# frame_face = Frame(frame_root)
# frame_face.grid(column =0, row = 0, padx =20, pady = 20)
# #button nhan dien
# btn_image_face_rec = Image.open('image/iconface.png')
# btn_image_face_rec = ImageTk.PhotoImage(btn_image_face_rec)
# # btn_image_face_rec_label = tk.Label(frame_face,image = btn_image_face_rec)
# # btn_image_face_rec_label.pack()
# # btn_image_face_rec_label.place(x = 10, y = 10)
# # btn_face_rec = tk.Button(frame_face, image=btn_image_face_rec, text = 'face re' , command=detect_face)
# # btn_face_rec.grid(column = 0, row = 0)
# # btn_face_rec.place(x = 10, y = 10)
# face_label = Label(frame_face, text = 'Face Attendance', font = ("Helvetica", 20), bd=0, relief = "sunken")
# face_label.grid(column = 0, row = 1)
# # face_label.place(x = 20, y=220)


##########frame add user################
# def open():
# 	top = tk.Toplevel(window)
# 	top.title("face")
# 	top.geometry("800x200")
# 	l1=tk.Label(top,text="Name",font=("Algerian",20))
# 	l1.grid(column=0, row=0)
# 	t1=tk.Entry(top,width=50,bd=5)
# 	t1.grid(column=1, row=0)

# 	l2=tk.Label(top,text="Age",font=("Algerian",20))
# 	l2.grid(column=0, row=1)
# 	t2=tk.Entry(top,width=50,bd=5)
# 	t2.grid(column=1, row=1)

# 	l3=tk.Label(top,text="Address",font=("Algerian",20))
# 	l3.grid(column=0, row=2)
# 	t3=tk.Entry(top,width=50,bd=5)
# 	t3.grid(column=1, row=2)
#train model
	# def train_classifier():
	#     data_dir="D:/BaiTapCuaTui/LuanVan/face_rec/data"
	#     path = [os.path.join(data_dir,f) for f in os.listdir(data_dir)]
	#     faces  = []
	#     ids   = []
	    
	#     for image in path:
	#         img = Image.open(image).convert('L');
	#         imageNp= np.array(img, 'uint8')
	#         id = int(os.path.split(image)[1].split(".")[1])
	        
	#         faces.append(imageNp)
	#         ids.append(id)
	#     ids = np.array(ids)
	    
	#     #Train the classifier and save
	#     clf = cv2.face.LBPHFaceRecognizer_create()
	#     clf.train(faces,ids)
	#     clf.write("classifier.xml")
	#     messagebox.showinfo('Result','Training dataset completed!!!')
	    
	# b1=tk.Button(top,text="Training",font=("Algerian",20),bg='orange',fg='red',command=train_classifier)
	# b1.grid(column=0, row=4)
#nhan dien diem danh
	# def detect_face():
	#     def draw_boundary(img,classifier,scaleFactor,minNeighbors,color,text,clf):
	#         gray_image = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
	#         features = classifier.detectMultiScale(gray_image,scaleFactor,minNeighbors)

	#         coords = []

	#         for(x,y,w,h) in features:
	#             cv2.rectangle(img,(x,y),(x+w,y+h),color,2)
	#             id,pred = clf.predict(gray_image[y:y+h,x:x+w])
	#             confidence = int(100*(1-pred/300))
	            
	#             mydb=mysql.connector.connect(
	#             host="localhost",
	#             user="root",
	#             passwd="",
	#             database="Authorized_user"
	#             )
	#             mycursor=mydb.cursor()
	#             mycursor.execute("select name from my_table where id="+str(id))
	#             s = mycursor.fetchone()
	#             s = ''+''.join(s)
	            
	#             if confidence>74:
	#                 cv2.putText(img,s,(x,y-5),cv2.FONT_HERSHEY_SIMPLEX,0.8,color,1,cv2.LINE_AA)
	#                 sql_attendance = "INSERT INTO attendance (id_user, name, date, time_in) VALUES (%s, %s, %s, %s)"
	#                 #xac dinh ngay gio hien tai
	#                 now = datetime.datetime.now()
	#                 dtStringtime = now.strftime('%H:%M:%S')
	#                 dtStringdate = now.strftime('%Y-%m-%d')
	#                 day = now.strftime('%d')
	#                 month = now.strftime('%m')
	#                 year = now.strftime('%Y')
	#                 intday = int(day)
	#                 intmonth = int(month)
	#                 intyear = int(year)
	#                 # print(item['values'][0])
	#                 #lay du lieu
	#                 mycursor.execute("SELECT (time_in) FROM attendance WHERE id_user = "+str(id))
	#                 myresult = mycursor.fetchall()
	#                 # x= ''.join(myresult)
	#                 # print(x)
	#                 # x =datetime.datetime.strptime(myresult, '%H:%M:%S')
	#                 print(x)
	#                 count = 0
	#                 for x in myresult:
	#                 	count +=1
	#                 if count>0:
	#                 	continue
	#                 else:
	#                 	val_attendance = (id,s, dtStringdate, dtStringtime)
	#                 	mycursor.execute(sql_attendance, val_attendance)
	#                 	mydb.commit()   
	#             else:
	#                 cv2.putText(img,"UNKNOWN",(x,y-5),cv2.FONT_HERSHEY_SIMPLEX,0.8,(0,0,255),1,cv2.LINE_AA)

	#             coords=[x,y,w,h]
	#         return coords
	            
	#     def recognize(img,clf,faceCascade):
	#         coords = draw_boundary(img,faceCascade,1.1,10,(255,255,255),"Face",clf)
	#         return img

	#     faceCascade=cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
	#     clf = cv2.face.LBPHFaceRecognizer_create()
	#     clf.read("classifier.xml")

	#     video_capture =  cv2.VideoCapture(0)

	#     while True:
	#         ret,img = video_capture.read()
	#         img=  recognize(img,clf,faceCascade)
	#         cv2.imshow("face detection",img)

	#         if cv2.waitKey(1)==ord('q'):
	#             break

	#     video_capture.release()
	#     cv2.destroyAllWindows()

	# b2=tk.Button(top,text="Detect the face",font=("Algerian",20),bg='green',fg='white',command=detect_face)
	# b2.grid(column=1, row=4)
#lay du lieu
	# def generate_dataset(x):
	#     if(t1.get()=="" or t2.get()=="" or t3.get()==""):
	#         messagebox.showinfo('Result','Please provide complete details of the user')
	#     else:
	#         mydb=mysql.connector.connect(
	#         host="localhost",
	#         user="root",
	#         passwd="",
	#         database="dbattendance"
	#         )
	#         mycursor=mydb.cursor()
	#         # mycursor.execute("SELECT * from my_table")
	#         # myresult=mycursor.fetchall()
	#         # id=1
	#         id=x
	#         # for x in myresult:
	#         #     id+=1
	#         # sql="insert into my_table(id,Name,Age,Address) values(%s,%s,%s,%s)"
	#         # val=(id,t1.get(),t2.get(),t3.get())
	#         # mycursor.execute(sql,val)
	#         # mydb.commit()
	        
	#         face_classifier = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
	#         def face_cropped(img):
	#             gray  = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
	#             faces = face_classifier.detectMultiScale(gray,1.3,5)
	#             #scaling factor=1.3
	#             #Minimum neighbor = 5

	#             if faces is ():
	#                 return None
	#             for(x,y,w,h) in faces:
	#                 cropped_face=img[y:y+h,x:x+w]
	#             return cropped_face

	#         cap = cv2.VideoCapture(0)
	#         img_id=0

	#         while True:
	#             ret,frame = cap.read()
	#             if face_cropped(frame) is not None:
	#                 img_id+=1
	#                 face = cv2.resize(face_cropped(frame),(200,200))
	#                 face  = cv2.cvtColor(face, cv2.COLOR_BGR2GRAY)
	#                 file_name_path = "data/user."+str(id)+"."+str(img_id)+".jpg"
	#                 cv2.imwrite(file_name_path,face)
	#                 cv2.putText(face,str(img_id),(50,50),cv2.FONT_HERSHEY_COMPLEX,1, (0,255,0),2)
	#                 # (50,50) is the origin point from where text is to be written
	#                 # font scale=1
	#                 #thickness=2

	#                 cv2.imshow("Cropped face",face)
	#                 if cv2.waitKey(1)==13 or int(img_id)==200:
	#                     break
	#         cap.release()
	#         cv2.destroyAllWindows()
	#         messagebox.showinfo('Result','Generating dataset completed!!!')

# 	b3=tk.Button(top,text="Generate dataset",font=("Algerian",20),bg='pink',fg='black',command=generate_dataset)
# 	b3.grid(column=1, row=4, padx = 5)

# 	################
	
# 	b4 = tk.Button(top,text="Back",font=("Algerian",20),bg='blue',command=top.destroy)
# 	b4.grid(column=2,row=4, padx =5)

# frame_add_user = Frame(frame_root)
# frame_add_user.grid(column = 3, row = 0, padx =20, pady = 20)
# # frame_exit.place(x = 30, y= 10)
# #####button add user######
# btn_image_adduser = Image.open('image/adduser.png')
# btn_image_adduser = ImageTk.PhotoImage(btn_image_adduser)
# btn_add_user = tk.Button(frame_add_user, image=btn_image_adduser, text = 'face re' , command=open)
# btn_add_user.grid(column = 0, row = 0)
# add_user_label = Label(frame_add_user, text = 'Add User', font = ("Helvetica", 20), bd=0, relief = "sunken")
# add_user_label.grid(column = 0, row = 1)



frame_att = Frame(frame_root,bg = "white")
frame_att.grid(column = 2, row = 2, padx =20, pady = 20)
# frame_exit.place(x = 30, y= 10)
# #####button attendance######
# btn_image_att = Image.open('image/attendanceicon.png')
# btn_image_att = ImageTk.PhotoImage(btn_image_att)
# btn_att = tk.Button(frame_att, image=btn_image_att, text = 'face re' , command='')
# btn_att.grid(column = 0, row = 0)
# att_label = Label(frame_att, text = 'Report', font = ("Helvetica", 20), bd=0, relief = "sunken")
# att_label.grid(column = 0, row = 1)


#####frame qrcode#####
def train_classifier():
	    data_dir="D:/BaiTapCuaTui/LuanVan/face_rec/data"
	    path = [os.path.join(data_dir,f) for f in os.listdir(data_dir)]
	    faces  = []
	    ids   = []
	    
	    for image in path:
	        img = Image.open(image).convert('L');
	        imageNp= np.array(img, 'uint8')
	        id = int(os.path.split(image)[1].split(".")[1])
	        
	        faces.append(imageNp)
	        ids.append(id)
	    ids = np.array(ids)
	    
	    #Train the classifier and save
	    clf = cv2.face.LBPHFaceRecognizer_create()
	    clf.train(faces,ids)
	    clf.write("classifier.xml")
	    messagebox.showinfo('Result','Training dataset completed!!!')
def generate_dataset(x):
	    # if(t1.get()=="" or t2.get()=="" or t3.get()==""):
	    #     messagebox.showinfo('Result','Please provide complete details of the user')
	    # else:
    mydb=mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="dbattendance"
    )
    mycursor=mydb.cursor()
    # mycursor.execute("SELECT * from my_table")
    # myresult=mycursor.fetchall()
    # id=1
    id=x
    # for x in myresult:
    #     id+=1
    # sql="insert into my_table(id,Name,Age,Address) values(%s,%s,%s,%s)"
    # val=(id,t1.get(),t2.get(),t3.get())
    # mycursor.execute(sql,val)
    # mydb.commit()
    
    face_classifier = cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
    def face_cropped(img):
        gray  = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
        faces = face_classifier.detectMultiScale(gray,1.3,5)
        #scaling factor=1.3
        #Minimum neighbor = 5

        if faces is ():
            return None
        for(x,y,w,h) in faces:
            cropped_face=img[y:y+h,x:x+w]
        return cropped_face

    cap = cv2.VideoCapture(0)
    img_id=0

    while True:
        ret,frame = cap.read()
        if face_cropped(frame) is not None:
            img_id+=1
            face = cv2.resize(face_cropped(frame),(200,200))
            face  = cv2.cvtColor(face, cv2.COLOR_BGR2GRAY)
            file_name_path = "data/user."+str(id)+"."+str(img_id)+".jpg"
            cv2.imwrite(file_name_path,face)
            cv2.putText(face,str(img_id),(50,50),cv2.FONT_HERSHEY_COMPLEX,1, (0,255,0),2)
            # (50,50) is the origin point from where text is to be written
            # font scale=1
            #thickness=2

            cv2.imshow("Cropped face",face)
            if cv2.waitKey(1)==13 or int(img_id)==200:
                break
    cap.release()
    cv2.destroyAllWindows()
    messagebox.showinfo('Result','Generating dataset completed!!!')

def qrcode_scanner():
	cap = cv2.VideoCapture(0)
	cap.set(3,640)
	cap.set(4,480)

	mydb=mysql.connector.connect(
	host="localhost",
	user="root",
	passwd="",
	database="dbattendance"
	)
	mycursor=mydb.cursor()
	while True:
	    success, img = cap.read()
	    for barcode in decode(img):
	        myData = barcode.data.decode('utf-8')
	        print(myData)
	        def detect_face():
	        	def draw_boundary(img,classifier,scaleFactor,minNeighbors,color,text,clf):
			        gray_image = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
			        features = classifier.detectMultiScale(gray_image,scaleFactor,minNeighbors)

			        coords = []

			        for(x,y,w,h) in features:
			            cv2.rectangle(img,(x,y),(x+w,y+h),color,2)
			            id,pred = clf.predict(gray_image[y:y+h,x:x+w])
			            confidence = int(100*(1-pred/300))
			            
			            mydb=mysql.connector.connect(
			            host="localhost",
			            user="root",
			            passwd="",
			            database="dbattendance"
			            )
			            mycursor=mydb.cursor(buffered=True)
			            mycursor.execute("SELECT Lastname FROM tblemployee WHERE EmployeeID = "+myData)
			            s = mycursor.fetchone()
			            s = ''+''.join(s)
			            
			            if confidence>74:
			                cv2.putText(img,s,(x,y-5),cv2.FONT_HERSHEY_SIMPLEX,0.8,color,1,cv2.LINE_AA)

			                 #xac dinh ngay gio hien tai
			                now = datetime.datetime.now()
			                dtStringtime = now.strftime('%H:%M %p')
			                dtStringdate = now.strftime('%Y-%m-%d')

			                # date_string = '2021-11-15'
			                # format = '%Y-%m-%d'
			                # dtStringdate = datetime.datetime.strptime(date_string, format)
			                # Total = int(now.strftime('%d'))+int(now.strftime('%m'))+int(now.strftime('%Y'))
			               	sql_noti = "INSERT INTO tblnotification (notification_status,notificationDate,notificationTime,EmployeeID) VALUES (%s, %s,%s,%s)"
		                	val_noti = ('Active',dtStringdate,dtStringtime,myData )
			                opts_s = opts.get()
		                	sql_attendance = "INSERT INTO tbltimetable (EmployeeID, TimeIn,TimeOut, AttendDate, EventTitle) VALUES (%s, %s,%s,%s,%s)"
		                	val_attendance = (myData,dtStringtime,'',dtStringdate, opts_s )
		                	
		                	# mycursor.execute("SELECT id")
		                	sql_attendance_out = "UPDATE tbltimetable SET TimeOut = %s WHERE EmployeeID =%s AND AttendDate = %s AND EventTitle = %s" #TimeTableID = (SELECT max(TimeTableID) FROM tbltimetable)"
		                	val_attendance_out = (dtStringtime, myData, dtStringdate, opts_s,)
			               
			                
			                #Dua du lieu vao bang verify
			                sql_verifytimein = "INSERT INTO tblverifytimeintimeout (EmployeeID,TimeIn,TimeOut,Verification,DateValidation,EventTitle) VALUES (%s, %s, %s , %s, %s, %s)"
			                val_verifytimein = (myData, dtStringtime, '','TimeIn', dtStringdate, opts_s) #moi thay id

			                sql_verifytimeout = "UPDATE tblverifytimeintimeout SET TimeOut = %s,Verification = %s WHERE DateValidation = %s AND EventTitle = %s AND EmployeeID =%s" #AND verifyID = (SELECT max(VerifyID) FROM tblverifytimeintimeout)"
			                val_verifytimeout = (dtStringtime, 'TimeOut', dtStringdate, opts_s,myData,)

			                #lay du lieu
			                sql_count_veri = "SELECT Verification FROM tblverifytimeintimeout WHERE DateValidation = %s AND EmployeeID = %s AND EventTitle = %s"  #verifyID = (SELECT max(verifyID) from tblverifytimeintimeout)"
			                val_count_veri = (dtStringdate, myData, opts_s,)
			                mycursor.execute(sql_count_veri, val_count_veri)
			                # mycursor.execute("SELECT Verification FROM tblverifytimeintimeout WHERE EmployeeID = myData" )
			                myresult = mycursor.fetchone()
			                

			                sql_count_timetable = "SELECT * FROM tbltimetable WHERE EmployeeID = %s AND AttendDate = %s AND EventTitle = %s AND TimeTableID = (SELECT max(TimeTableID) FROM tbltimetable )"
			                val_count_timeable = (myData, dtStringdate, opts_s,)
			                mycursor.execute(sql_count_timetable, val_count_timeable)
			                # mycursor.execute("SELECT NumberDate FROM tbltimetable WHERE EmployeeID ="+myData)
			                myres_timeinout = mycursor.fetchall()
			                

			                count1 = 0
			                # print (int(now.strftime('%d'))+int(now.strftime('%m'))+int(now.strftime('%Y')))
			                # x = ''+''.join(myres_timeinout)
			                
			                for x in myres_timeinout:
			                	count1 += 1

			                print('so count la %d ',count1)
		                	if count1 > 0:
		                		print()
			                	y = ''+''.join(myresult[0])
			                	print(y)
		                		if y == 'TimeIn':
		                			mycursor.execute(sql_verifytimeout, val_verifytimeout)
		                			mycursor.execute(sql_attendance_out, val_attendance_out)
		                			mycursor.execute(sql_noti, val_noti)
		                			mydb.commit()
		                			video_capture.release()
		                			cap.release()
		                			cv2.destroyAllWindows()
		                		else:
		                			messagebox.showinfo('Result','Attendance Checked !!!')
		                			
		                			video_capture.release()
		                			cv2.destroyAllWindows()
		                			break
			                else:
			                	mycursor.execute(sql_attendance, val_attendance)
			                	mycursor.execute(sql_verifytimein, val_verifytimein)
			                	mycursor.execute(sql_noti, val_noti)
			                	mydb.commit()
			                	video_capture.release()
			                	cv2.destroyAllWindows()
			            else:
			                cv2.putText(img,"UNKNOWN",(x,y-5),cv2.FONT_HERSHEY_SIMPLEX,0.8,(0,0,255),1,cv2.LINE_AA)
			                continue

			            coords=[x,y,w,h]
			        return coords
		        def recognize(img,clf,faceCascade):
			        coords = draw_boundary(img,faceCascade,1.1,10,(255,255,255),"Face",clf)
			        return img
		        faceCascade=cv2.CascadeClassifier("haarcascade_frontalface_default.xml")
		        clf = cv2.face.LBPHFaceRecognizer_create()
		        clf.read("classifier.xml")
		        video_capture =  cv2.VideoCapture(0)
		        while True:
			        ret,img = video_capture.read()
			        img=  recognize(img,clf,faceCascade)
			        cv2.imshow("face detection",img)
			        if cv2.waitKey(1)==ord('q'):
			        	break
		        video_capture.release()
		        cv2.destroyAllWindows()
			        
	        pts = np.array([barcode.polygon],np.int32)
	        pts = pts.reshape((-1,1,2))
	        cv2.polylines(img,[pts],True,(255,0,255),5)
	        pts2 = barcode.rect
	        # cv2.putText(img,myData,(pts2[0],pts2[1]),cv2.FONT_HERSHEY_SIMPLEX,
	        #             0.9,(255,0,255),2)

	        mycursor.execute("SELECT * FROM tblemployee WHERE EmployeeID = "+myData)
	        myresult1 = mycursor.fetchall()
	        count = 0
	        for x in myresult1:
	        	count +=1
	        if count>0:
	        	cv2.putText(img,'done',(pts2[0],pts2[1]),cv2.FONT_HERSHEY_SIMPLEX,
	                    0.9,(255,0,255),2)
	        	#neu cham cong lan dau thi se cho dang ki face
	        	mycursor.execute("SELECT * FROM tbltimetable WHERE EmployeeID = "+myData)
		        myresult2 = mycursor.fetchall()
		        count_att_to_res = 0

		        for z in myresult2:
		        	count_att_to_res +=1
		        print(count_att_to_res)
		        if count_att_to_res == 0:
		        	if messagebox.askyesno("Please Confirm", "This is your first time, please register your face"):
		        		# cv2.destroyAllWindows()
		        		generate_dataset(myData)
		        		train_classifier()
		        		detect_face()
		        	else:
		        		break
		        else:
		        	if messagebox.askyesno("successfully!", "Scan qr code successfully! You need to take attendance by face recognize to complete"):
		        		# cv2.destroyAllWindows()
		        		cap.release()
		        		cv2.destroyAllWindows()
		        		detect_face()
		        	else:
		        		return True
	        else:
	        	cv2.putText(img,'un-done',(pts2[0],pts2[1]),cv2.FONT_HERSHEY_SIMPLEX,
	                    0.9,(255,0,255),2)


	        # sql_attendance_qrcode = "INSERT INTO attendance (id_user, name,date, time_in) VALUES (%s,%s,%s, %s)"
	        # #xac dinh ngay gio hien tai
	        # now = datetime.datetime.now()
	        # dtStringdate = now.strftime('%Y-%m-%d')
	        # dtStringtime = now.strftime(' %H:%M:%S')
	        # #lay du lieu
	        # #mycursor.execute("SELECT * FROM attendance WHERE id_user = "+myData)
	        # #myresult = mycursor.fetchall()
	        # #count = 0
	        # #for x in myresult:
	        #  #   count +=1
	        # #if count>0:
	        #  #   continue
	        # #else:
	        # val_attendance = (myData,myData, dtStringdate, dtStringtime)
	        # mycursor.execute(sql_attendance_qrcode, val_attendance)
	        # mydb.commit()

	    cv2.imshow('Result',img)
	    if cv2.waitKey(1)==ord('q'):
	    	break

frame_qr = Frame(frame_root)
frame_qr.grid(column = 0, row = 2, padx =90, pady = 20)
# frame_exit.place(x = 30, y= 10)
#####button exit######
btn_image_qr = Image.open('image/qrcodeicon.png')
btn_image_qr = ImageTk.PhotoImage(btn_image_qr)
# btn_image_exit_label = tk.Label(frame_exit,image = btn_image_exit)
# btn_image_exit_label.pack()
btn_qr = tk.Button(frame_qr, image=btn_image_qr, text = 'face re' , command=qrcode_scanner)
btn_qr.grid(column = 0, row = 0)
qr_label = Label(frame_qr, text = 'QR Code', font = ("Helvetica", 20), bd=0, relief = "sunken")
qr_label.grid(column = 0, row = 1)


# ########frame create qrcode################
# def create_qr():
# 	qr = qrcode.QRCode(
# 	version=1,
# 	box_size=15,
# 	border=5
# )

# 	data = 'your text here'
# 	qr.add_data(data)
# 	qr.make(fit=True)
# 	img = qr.make_image(fill='black', back_color='white')
# 	img.save('qrcode.png')

# def open_createqr():
# 	top_createqr = tk.Toplevel(window)
# 	top_createqr.title("Create QRCode")
# 	top_createqr.geometry("800x200")
# 	lable1=tk.Label(top_createqr,text="ID",font=("Algerian",20))
# 	lable1.grid(column=0, row=0)
# 	value = random.randrange(1111111, 9999999, 1)
# 	text1=tk.Entry(top_createqr,width=50,bd=5)
# 	text1.insert(0, value)
# 	text1.grid(column=1, row=0)
# 	def create_qr():
# 		qr = qrcode.QRCode(
# 		version=1,
# 		box_size=15,
# 		border=5
# 	)

# 		data = value
# 		qr.add_data(data)
# 		qr.make(fit=True)
# 		img = qr.make_image(fill='black', back_color='white')
# 		img.save('qrcode.png')
# 	btn_create_qr_code = tk.Button(top_createqr, text = 'Create' , command=create_qr)
# 	btn_create_qr_code.grid(column =1 , row = 1)
# frame_create_qr = Frame(frame_root)
# frame_create_qr.grid(column = 1, row = 1, padx =20, pady = 20)
# # frame_exit.place(x = 30, y= 10)
# #####button create qrcode######
# btn_img_create_qr = Image.open('image/createqr.png')
# btn_img_create_qr = ImageTk.PhotoImage(btn_img_create_qr)
# # btn_image_exit_label = tk.Label(frame_exit,image = btn_image_exit)
# # btn_image_exit_label.pack()
# btn_create_qr = tk.Button(frame_create_qr, image=btn_img_create_qr, text = 'face re' , command=open_createqr)
# btn_create_qr.grid(column = 0, row = 0)
# create_qr_label = Label(frame_create_qr, text = 'Create QRCode', font = ("Helvetica", 20), bd=0, relief = "sunken")
# create_qr_label.grid(column = 0, row = 1)



# ######open employee#######
# def open_employ():
# 	q=StringVar()
# 	top_em = tk.Toplevel(window)
# 	top_em.title("Employee")
# 	#top_em.resizable(False, False)
# 	frame_em = LabelFrame(top_em, text = "Employee List")
# 	frame_em.pack(fill = "both", expand = "yes", padx = "20", pady = "10")
# 	frame_search = LabelFrame(top_em, text = "Search")
# 	frame_search.pack(fill = "both", expand = "yes", padx = "20", pady = "10")
# 	frame_commands = LabelFrame(top_em, text = "Commands")
# 	frame_commands.pack(fill = "both", expand = "yes", padx = "20", pady = "10")

# 	tv_em = ttk.Treeview(frame_em, columns=(0,1,2,3), show="headings", height="5")
# 	tv_em.pack()
# 	mydb=mysql.connector.connect(
# 	        host="localhost",
# 	        user="root",
# 	        passwd="",
# 	        database="Authorized_user"
# 	        )
# 	mycursor=mydb.cursor()
# 	mycursor.execute("select * from my_table ")
# 	rows_em = mycursor.fetchall()

# 	def getrow(event):
# 		rowid = tv_em.identify_row(event.y)
# 		item = tv_em.item(tv_em.focus())
# 		# print(item['values'][0])
# 		eid.set(item['values'][0])
# 		ena.set(item['values'][1])
# 		eag.set(item['values'][2])
# 		ead.set(item['values'][3])

# 	tv_em.heading(0, text="STT")
# 	tv_em.heading(1, text="Name")
# 	tv_em.heading(2, text="Age")
# 	tv_em.heading(3, text="Address")
# 	tv_em.bind('<Double 1>', getrow)
# 	def update(rows_em):
# 		tv_em.delete(*tv_em.get_children())
# 		for i in rows_em:
# 			tv_em.insert('','end', values=i)
# 	def search():
# 		mydb=mysql.connector.connect(
# 	        host="localhost",
# 	        user="root",
# 	        passwd="",
# 	        database="Authorized_user"
# 	        )
# 		mycursor=mydb.cursor()
# 		q2 = ent_search.get()
# 		mycursor.execute("SELECT * FROM my_table WHERE Name LIKE '%"+q2+"%' ")
# 		row_s = mycursor.fetchall()
# 		update(row_s)
# 	def clear():
# 		mydb=mysql.connector.connect(
# 	        host="localhost",
# 	        user="root",
# 	        passwd="",
# 	        database="Authorized_user"
# 	        )
# 		mycursor=mydb.cursor()
# 		mycursor.execute("SELECT * FROM my_table")
# 		rows_clear = mycursor.fetchall()
# 		update(rows_clear)
# 	update(rows_em)
# 	#Search
# 	label_search = Label(frame_search, text = "Search")
# 	label_search.pack(side = tk.LEFT, padx = 10)
# 	ent_search = Entry(frame_search, textvariable=q)
# 	ent_search.pack(side = tk.LEFT, padx = 6)
# 	btn_Search = Button(frame_search, text="Search", command = search)
# 	btn_Search.pack(side = tk.LEFT, padx = 6)

# 	#clear
# 	btn_clear = Button(frame_search, text = "Clear", command = clear)
# 	btn_clear.pack(side = tk.LEFT, padx=6)

# 	#user data
# 	eid = StringVar()
# 	ena = StringVar()
# 	eag = StringVar()
# 	ead = StringVar()

# 	def update_em():
# 		up_name = ena.get()
# 		up_age = eag.get()
# 		up_addr = ead.get()
# 		up_id = eid.get()
# 		mydb=mysql.connector.connect(
# 		        host="localhost",
# 		        user="root",
# 		        passwd="",
# 		        database="Authorized_user"
# 		        )
# 		mycursor=mydb.cursor()
# 		if messagebox.askyesno("Comfirm Please?", "Are you sure you want to update this employee?"):
# 			query = "UPDATE my_table SET Name = %s, Age = %s, Address = %s WHERE id = %s"
# 			mycursor.execute(query, (up_name, up_age, up_addr, up_id))
# 			mydb.commit()
# 			clear()
# 		else:
# 			return True

# 	def add_em():
# 		# add_name = ena.get()
# 		# add_age = eag.get()
# 		# add_addr = ead.get()
# 		# mydb=mysql.connector.connect(
# 		#         host="localhost",
# 		#         user="root",
# 		#         passwd="",
# 		#         database="Authorized_user"
# 		#         )
# 		# mycursor=mydb.cursor()
# 		# query = "INSERT INTO my_table( Name, Age, Address) VALUES( %s, %s, %s)"
# 		# mycursor.execute(query, (add_name, add_age, add_addr))
# 		# mydb.commit()
# 		# clear()
# 		qr = qrcode.QRCode(
# 		version=1,
# 		box_size=15,
# 		border=5
# 		)

# 		data = eid.get()
# 		qr.add_data(data)
# 		qr.make(fit=True)
# 		img = qr.make_image(fill='black', back_color='white')
# 		img.save('qrcode.png')

# 	def del_em():
# 		mydb=mysql.connector.connect(
# 		        host="localhost",
# 		        user="root",
# 		        passwd="",
# 		        database="Authorized_user"
# 		        )
# 		id_em = eid.get()
		
# 		mycursor=mydb.cursor()
# 		if messagebox.askyesno("Comfirm Delete ?", "Are you sure you want to delete this employee?"):
# 			query = "DELETE FROM my_table WHERE id = "+id_em
# 			mycursor.execute(query)
# 			mydb.commit()
# 			ent_id.delete(0,END)
# 			ent_name.delete(0, END)
# 			ent_age.delete(0, END)
# 			ent_address.delete(0, END)
# 			clear()
# 		else:
# 			return True

# 	label_id = Label(frame_commands, text = "ID")
# 	label_id.grid(row = 0, column = 0, padx = 5, pady =3)
# 	ent_id = Entry(frame_commands, textvariable = eid)
# 	ent_id.grid(row = 0, column = 1, padx = 5, pady =3)

# 	label_name = Label(frame_commands, text = "Name")
# 	label_name.grid(row = 1, column = 0, padx = 5, pady =3)
# 	ent_name = Entry(frame_commands, textvariable = ena)
# 	ent_name.grid(row = 1, column = 1, padx = 5, pady =3)

# 	label_age = Label(frame_commands, text = "Age")
# 	label_age.grid(row = 2, column = 0, padx = 5, pady =3)
# 	ent_age = Entry(frame_commands, textvariable = eag)
# 	ent_age.grid(row = 2, column = 1, padx = 5, pady =3)

# 	label_address = Label(frame_commands, text = "Address")
# 	label_address.grid(row = 3, column = 0, padx = 5, pady =3)
# 	ent_address = Entry(frame_commands, textvariable = ead)
# 	ent_address.grid(row = 3, column = 1, padx = 5, pady =3)

# 	btn_update_em = Button(frame_commands, text = "Update", command = update_em)
# 	btn_update_em.grid(row = 4, column=0, padx = 5, pady = 3)

# 	btn_add_em = Button(frame_commands, text = "Add QRCode", command = add_em)
# 	btn_add_em.grid(row = 4, column=1, padx = 5, pady = 3)

# 	btn_del_em = Button(frame_commands, text = "Delete", command = del_em)
# 	btn_del_em.grid(row = 4, column=2, padx = 5, pady = 3)

# 	top_em.geometry("900x700")

# # ##########frame employ################
# frame_employ = Frame(frame_root)
# frame_employ.grid(column = 0, row = 1, padx =20, pady = 20)
# # # frame_exit.place(x = 30, y= 10)
# # #####button employ######
# # btn_image_employ = Image.open('image/employicon.png')
# # btn_image_employ = ImageTk.PhotoImage(btn_image_employ)
# btn_exit = tk.Button(frame_employ, image=btn_image_employ, text = 'face re' , command=open_employ)
# btn_exit.grid(column = 0, row = 0)
# exit_label = Label(frame_employ, text = 'Employee', font = ("Helvetica", 20), bd=0, relief = "sunken")
# exit_label.grid(column = 0, row = 1)






##########frame exit################
frame_exit = Frame(frame_root)
frame_exit.grid(column = 3, row = 2, padx =0, pady = 20)
# frame_exit.place(x = 30, y= 10)
#####button exit######
btn_image_exit = Image.open('image/exiticon.png')
btn_image_exit = ImageTk.PhotoImage(btn_image_exit)
# btn_image_exit_label = tk.Label(frame_exit,image = btn_image_exit)
# btn_image_exit_label.pack()
btn_exit = tk.Button(frame_exit, image=btn_image_exit, text = 'face re' , command=window.destroy)
btn_exit.grid(column = 0, row = 0)
exit_label = Label(frame_exit, text = 'Exit', font = ("Helvetica", 20), bd=0, relief = "sunken")
exit_label.grid(column = 0, row = 1)




window.geometry("1005x756")
window.configure(background="white")
window.mainloop()