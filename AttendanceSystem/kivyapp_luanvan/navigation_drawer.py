navigation_helper = """
Screen:
    ScreenManager:
        id: screen_root
        Screen:
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
        Screen:
            id: screen_inapp
            name: 'screen_inapp'
            MDNavigationLayout:
                ScreenManager:
                    Screen:
                        BoxLayout:
                            orientation: 'vertical'
                            MDToolbar:
                                title: 'Attendance Application'
                                left_action_items: [["menu", lambda x: nav_drawer.set_state('toggle')]]
                                right_action_items: [["bell-outline", lambda x: app.notice_press()]]
                                elevation:5
                            MDBottomAppBar:
                                MDToolbar:
                                    icon: 'home'
                                    type: 'bottom'
                                    left_action_items: [["calendar-check", lambda x: app.attendance_press()]]
                                    right_action_items: [["format-list-bulleted-square", lambda x: app.event_press()]]
                                    on_action_button: screen_manager.current = 'home'
                            Screen:
                                ScreenManager:
                                    id: screen_manager
                                    Screen:
                                        name: 'home'
                                        BoxLayout:
                                            orientation: 'vertical'
                                            MDFloatingActionButton:
                                                icon: 'calendar-month'
                                                text: 'Profile'
                                                pos_hint: {'center_x':0.3,'center_y':0.5}
                                                on_press: screen_manager.current = 'attendance'
                                            MDFloatingActionButton:
                                                icon: 'phone-return-outline'
                                                text: 'Upload'
                                                pos_hint: {'center_x':0.7,'center_y':0.5}
                                                on_press: screen_manager.current = 'event'
                                    Screen:
                                        name: 'attendance'
                                        MDLabel:
                                            text: 'Attendance'
                                            halign: 'center'
                                        MDRectangleFlatButton:
                                            text: 'Back'
                                            pos_hint: {'center_x':0.5,'center_y':0.2}
                                            on_press: screen_manager.current = 'home'
                                    Screen:
                                        name: 'event'
                                        size_hint: 1, 0.90
                                        MDLabel:
                                            text: 'Events'
                                            halign: 'center'
                                        MDRectangleFlatButton:
                                            text: 'Back'
                                            pos_hint: {'center_x':0.5,'center_y':0.2}
                                            on_press: screen_manager.current = 'home'
                                    Screen:
                                        name: 'notice'
                                        BoxLayout:
                                            orientation: 'vertical'
                                            ScrollView:
                                                MDList:
                                                    id: container
                            Widget:

                            
                                         
                            
                                
                        
                    
                     

                MDNavigationDrawer:
                    id: nav_drawer
                    ContentNavigationDrawer:
                        orientation: 'vertical'
                        padding: "8dp"
                        spacing: "8dp"
                        Image:
                            id: avatar
                            size_hint: (1,1)
                            source: "mine.jpg"
                        MDLabel:
                            text: "Attreya"
                            font_style: "Subtitle1"
                            size_hint_y: None
                            height: self.texture_size[1]
                        MDLabel:
                            text: "attreya01@gmail.com"
                            size_hint_y: None
                            font_style: "Caption"
                            height: self.texture_size[1]
                        ScrollView:
                            DrawerList:
                                id: md_list
                                
                                MDList:
                                    OneLineIconListItem:
                                        text: "Profile"
                                    
                                        IconLeftWidget:
                                            icon: "face-profile"
                                            
                                   
                                            
                                    OneLineIconListItem:
                                        text: "Upload"
                                    
                                        IconLeftWidget:
                                            icon: "upload"
                                            
                                   
                                    OneLineIconListItem:
                                        text: "Logout"
                                    
                                        IconLeftWidget:
                                            icon: "logout"       
        

"""