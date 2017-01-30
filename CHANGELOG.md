## 0.12.0
+ accessibility changes
+ remove h2 and h3 from site header, replaced with #sitename and #sitedescription
+ add sections with roles, aria_label and aria_labelledby attributes
+ add roles, aria_label and aria_labelledby attributes for all areas in header.php and footer.php
+ search field aria and role
+ sidenav aria and role
+ admin bar aria and role
+ breadcrumb area and role

## 0.11.2
+ add function to remove Advanced CSS from Customizer

## 0.11.1
+ add Groh PS to functions list
+ update school list with Groh Address
+ update school list with Continuing Education addresses and websites
- remove International Languages from Continuing Education area of school list

## 0.11.0

+ replace links to assets
+ move CSS and Javascript assets to AWS
+ move core images to AWS
+ add Chicopee Hills as a new school
+ add Groh PS as a new school
+ update school list
- remove vote banners from school sites (ref: 5922 Vote CTA)

## 0.10.3
Content 
+ implement request 5922 Vote CTA for school banner section

## 0.10.2
Fix
+ Phone numbers fixed for Alternative Education

## 0.10.1
Fix
+ Add Alternative Education Schools to the school list template
+ Create a modified sidebar for school websites that aren't physical schools (experiential learning, language schools, et al)
+ Remove fieldset from search in header (only one field, unnecessary)
+ Update asset links to AWS instead of WordPress to reduce load
+ Add tracking code to staff intranet link to track usage
+ Adjust administrative link bar to not display school handbook for schools that aren't physical schools
+ Create new function for school exceptions

## 0.10.0
Feature Change
+ remove customized login code to revert to default WordPress options

## 0.9.4
Fix
+ fix alert styles
+ remove unused widget areas
+ describe purpose for centrally managed widget areas
+ describe purpose for site managed widget areas

## 0.9.3
Fix
+ replace http references with https

## 0.9.2
Fix
+ remove V prefix from voicemails in staff_list.php

## 0.9.1
Fix
+ adapt School-Day iframe to properly fill the sidebar space
+ convert email addresses in staff lists to @wrdsb.on.ca
+ add CHI to the school function (new school Chicopee Hills 2017)

## 0.9.0
Content
+ replace School-Day banner with form on all school sites

## 0.8.9
Fix
+ update URL for schools.json list to use AWS S3 bucket

## 0.8.8
Fix
+ pull images for SYI page templates from corp site instead of dev site

## 0.8.7
Content
+ updated SYI page templates to remove PDFs and dated information

## 0.8.6
Content
+ add kindergarten link back onto school websites

## 0.8.5
Fix
+ favicon function extended for child theme support

## 0.8.4
Feature
+ favicon added

## 0.8.3
Content
+ removed SCIS survey

## 0.8.2
Feature
+ div.register css added for registration buttons
+ ninja form styles for updates

## 0.8.1
Content
+ removed Before & After button

## 0.8.0
Feature
+ added tracking code for SiteInsight to corporate network

## 0.7.18
Content
+ removed button for student trustees from secondary school sites

## 0.7.17
Fixes
+ fixed spelling and postal code formatting for display of school list
+ fixed telephone format for display of school list
+ fixed mobile display for school list
+ refactored the code for the school list
+ moved school list template to /page-templates/ directory (CAUTION: Any pages using this template will need to have the template reset.)
+ added Continuing Education to exclude list

Content
+ added button for student trustees to secondary school sites
+ added new school year calendar to both School Year Information page templates

## 0.7.16
Fixes
+ open Featured Image access to all custom post types
+ remove styling conflict for th padding and Ninja Forms Table Editor

## 0.7.15
Content
+ added Phase 9 schools to school-day function

## 0.7.14
Content
+ removed Kindergarten Button
+ added SCIS 2016 Survey Button

## 0.7.13
Content
+ added Facebook and Twitter to the footer for the corporate network

## 0.7.12
Content
+ added SIL to school-day function

## 0.7.11
Content
+ added Phase 8 school-day schools to school-day function

Fixes
+ repaired login links to work with single login for schools
+ removed login for staff intranet from staff intranet
+ renamed "Staff Website" to "Staff Intranet"
+ removed public subscription form link from footer

## 0.7.10
Fixes
+ repair undefined index and undefined variables in functions.php and header.php

## 0.7.9
Fixes
+ remove How to Register for Kindergarten page template

## 0.7.8
Content
+ adjusted content in How to Register for Kindergarten page template
+ added button for Kindergarten Registration to home.php for schools with kindergarten
Fixes
+ added .intro as a style
+ fine-tuned table cell hover effect

## 0.7.7
Fixes
+ added new schools
+ removed closed school
+ adjusted headings for news posts in stream and alone (accessibility)
+ adjusted stylings for headings for news posts in stream (visual appearance)

## 0.7.6
Fixes
+ added conditional to footer-centre to selectively replace subscribe by email widget with new mailgun subscription widget, if available

## 0.7.5
Fixes
+ added div.pagination to prev/next/edit links
+ updated 404 page content and layout

## 0.7.4
Fixes
+ adjusting login function to work with child themes

## 0.7.3
Fixes
+ change login logo
+ replace lost password link with MyPassword
+ replace lost password wording

## 0.7.2
Fixes
+ fix width of alert

## 0.7.1
Fixes
+ adjust colours for SSS

## 0.7.0
Featured Added
+ add alert function condition and styles

## 0.6.5
Fixes
+ set conditional to have left sidebar not show unless there are menus/widgets if the non-news page is the front page (teacher sites)

## 0.6.4
Fixes
+ fix fade to not impact #contact

## 0.6.3
Fixes
+ adjusting left sidebar to fix display when no widgets are displaying
+ fixing right sidebar list display and menu display
+ updating all high school css files to be consistent with their colours in sub-sub navigation
+ add spacing above internal targets so they are fully visible when admin bar showing

## 0.6.2
Content Update
+ Mental Health link added to SYI page templates

## 0.6.1
Content Update
+ added heading to log in form for School-Day in /page-templates/school-day/

## 0.6.0
Fixes
+ changed to middot from bullet for demarcating categories and tags
+ added #loginbar to footer
+ customized #loginbar for all highschool websites
+ removed redundant copyright and creator information
+ added school-day page template
+ adjusted columns to make right column only pages same ratio as left column only pages
+ added school-day school banner
+ added school banner tracking
+ changed WEFI school banner to link directly to donation site
+ adjusted headings for SYI page templates

## 0.5.5
Fixes
* exclude user id 1 from staff list

## 0.5.4

* fix user query and display conditional in staff_list.php

## 0.5.3
* pulled in changes to staff_list.php template to remove vanity sort prefix

## 0.5.2
+ added tags and text domain for WRDSB Theme

## 0.5.1
+ ensuring the school list is accurate

## 0.5.0
+ changed function for address to work with new plugin

## 0.4.4
Content
+ added announcement information to SYI page templates

## 0.4.3
Content
+ added Website Feedback Form link to footer

## 0.4.2
Fixes
+ remembered to update the Changelog again
+ changed WEFI button (new logo)
+ removed SCIS button (expired May 31)

## 0.4.1
+ tag.php

## 0.4.0
Feature Added
+ category.php (with descriptions now displaying)
+ minor layout fixes

## 0.3.10
Fixes
+ fixed typography for lmenu/sidebar headers

## 0.3.9
Fixes
+ remembered to update the Changelog...

## 0.3.8
Fixes
+ remove borders from school table
+ gnss.css added
+ gnss and dsps added to school lists in functions
+ fixed description of footer file
+ added padding to navigation menu for .nav_current_page_children_container

## 0.3.7
Fixes
+ clearfix for categories/tags so floated content will not display it (requires a category or tag be set)
+ .tip added as a floating block type
+ dl display fix so dt content will wrap

## 0.3.6
Fixes
+ left sidebar added to all custom page templates
+ removed page templates no longer in use (will default to default template)

## 0.3.5
Fixes
+ adjusted right sidebar on single.php when left sidebar in use

## 0.3.4
Fixes
+ add left sidebar to single.php template

## 0.3.3
Fixes
+ add SCIS survey button (corporate area)

## 0.3.2
Fixes
+ removed automated left menu from news pages, resolving error in display

## 0.3.1
+ removed automated left menu from archive.php

## 0.3.0
Features
* Add Google Analytics tracking code for www.wrdsb.ca
* Add Google Analytics tracking code for staff.wrdsb.ca
* Add Google Analytics tracking code for schools.wrdsb.ca
