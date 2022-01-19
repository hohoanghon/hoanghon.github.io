from kivy.lang import Builder
from kivymd.app import MDApp
from kivymd.uix.pickers import MDDatePicker

kv = """
MDFloatLayout:

	MDFloatingActionButton:
		icon: 'calendar'
		pos_hint: {'center_x': .5, 'center_y': .5}
		on_release: app.show_date_picker()


	MDLabel:
		id: date_label
		text: "Some Stuff!"
		pos_hint: {'center_x': .95, 'center_y': .4}
"""
class MainApp(MDApp):
	def build(self):
		self.theme_cls.theme_style = "Light"
		self.theme_cls.primary_palette = "Blue"
		return Builder.load_string(kv)

	# Get Time
	def on_save (self, instance, value, date_range):
		self.root.ids.date_label.text = f'{str(date_range[0])} - {str(date_range[-1])}'
		print(date_range[0],date_range[-1])
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
	
MainApp().run()