# Cyber Shoppy (Simple E-Commerce Website in PHP)

The website shopping system (Online Shopping System) was using the internet as the sole method for selling goods to its consumers. It would allow customers to register with the site and purchase goods online. Using sessions to save users, users can add and purchase products. Various products where displayed through a database, in the index page as well as categorized and dispalyed int subdetails page, from where the user can view the products or selected items by clicking the Quick View button that appears while hovering the cursor over a specific item in Subdetails page.

Once viewed the product properlyand checked if the quality of item meets the expectation of customer, they can add item to the cart from where the user can select partcular item and buy it and can also buy all the items present in the cart. The cart page fulfills almost the use of both wishlist and cart int this shoppping site.

 Since it was my first E-commerce website project, which have been done in a duration of 6 months(approx) as major project while pursing my MCA degree,so payment gateway mechanism is yet to be provided. Hopefull in upcomin days it will be added.
 
 #### Technologies used: 
 HTML5, CSS3, Bootstrap, Javascript, PHP
 
 #### Platform: 
 Xampp control pannel(cross platform)
 
 #### Local server:
 Apache server provided by Xampp
 
 #### Local database:
 MYSQL
 
 
 # How to run this Project ?
 
  * First download the XAMPP server and start it.
  * Now download this project, unzip it and save it in htdocs folder under Xampp folder which resides by default in C drive while installing (if installation location of XAMPP server is not changed during installation).
  * location of htdocs is c:/xampp/htdocs
  * Open your browser.
  * Within the DB folder in htdocs select the shopping.sql file and import the file using XAMPP control pannel.
  * url for XAMPP control pannel= localhost/phpmyadmin
  * Type in url= localhost/cyber_shoppe/index.php
  
  
  # Usage
  
  ##  1. User Module:
  The user index page of online shopping site provides us with different options in the navigation panel. From where user can Sign in if already registered or if the user is new then he/she can register first themselves. Then login with the credentials.
  
  ![1](https://user-images.githubusercontent.com/48457036/69572562-65a07580-0fea-11ea-9571-f3320e901f72.jpg)

By clicking on the “Sign in” link, the Modal for login appears at the top of the screen. Then by putting the correct credentials in the correct fields, a user can login to their account thereby clicking on the “LOGIN” button, if the user account already exists.
  
  ![2](https://user-images.githubusercontent.com/48457036/69573027-5241da00-0feb-11ea-9f82-ce5b355be78f.jpg)

After clicking on login button if the user provide correct login credentials the control will display a success message which states that the user has successfully logged in within a pop up message, below which an “OK” button is placed, by clicking that the control will redirect the user to the index page where in the top right side a message will be displayed which states that the user has successfully logged in his/her account.

![3](https://user-images.githubusercontent.com/48457036/69577097-acdf3400-0ff3-11ea-9aa9-5e335b46448b.png)

In the index page (Home page), the navigation panel also provides several other features like choosing the product category wise. Initially, the products are divided into two categories Men’s and Women’s section. By clicking any of the categories a drop down menu appears where the subcategories are listed. 

![4](https://user-images.githubusercontent.com/48457036/69577210-ef087580-0ff3-11ea-98f4-1605ea7a5236.png)

By clicking on any of the subcategories, the user will be redirected to another page where the products of those particular categories will be displayed to the user which are available in the stock. From this page we can see any products detail information if we wish to, by clicking on the “Quick view” option that appears in the image of each product whenever we hover the mouse cursor over any particular product.

![5](https://user-images.githubusercontent.com/48457036/69577313-1c552380-0ff4-11ea-9f4a-efece6ff7114.png)

By clicking on “QUICKVIEW button”, the user will be redirected to a new page where the information of the specific product is displayed in details like the original price in Indian currency along with the amount of money which is off on the particular product. The availability of the size is mentioned there, along with number of item present in the stock.

![6](https://user-images.githubusercontent.com/48457036/69577383-3bec4c00-0ff4-11ea-809a-360d2fc66027.png)

The user can also select the quantity of items he/she want to order together, by clicking on the dropdown menu positioned above the button “Add to Cart”.

![7](https://user-images.githubusercontent.com/48457036/69577623-bae18480-0ff4-11ea-9b86-0d64780d7eda.png)

By clicking on the “Add to Cart” button the user will receive a pop up notification above the page which will display a message stating that the item is added to Cart. Below which “OK” button is placed, by clicking which the control will redirect the user to the cart page.

![8](https://user-images.githubusercontent.com/48457036/69577666-dd739d80-0ff4-11ea-89b3-5f6976631df2.png)

In the cart page, the product that we have added to the cart, will be displayed by all the details and information in a tabular format. And at the end of each Product details which is added to the cart, there is a cross button, By clicking which, the Item will be removed from the cart.

![9](https://user-images.githubusercontent.com/48457036/69577716-f8461200-0ff4-11ea-9373-e1af7bcbc1c2.png)

By clicking on the cross button, the user will receive a pop up menu above the page which will display the message that “Your Order for the particular product is cancelled”.

![10](https://user-images.githubusercontent.com/48457036/69577757-13188680-0ff5-11ea-93a7-a773e52b6455.png)

Below which there is a “OK” button by clicking which the control will redirect the user to the cart page where he/ she can see that the added product is removed from the cart. And also the total amount of the money, which is displayed in the cart page against the product that is added also became zero (0).

![11](https://user-images.githubusercontent.com/48457036/69577800-2fb4be80-0ff5-11ea-8c72-61ecd9b1ae59.png)

User can also add multiple products in the cart and by clicking the “Buy” button, user can purchase the products available in the cart.

![12](https://user-images.githubusercontent.com/48457036/69577866-4eb35080-0ff5-11ea-852d-91013ce1f0c8.png)

Then by clicking the “Buy” button, the pop up notification will be displayed above the screen that states the user with a message that the user has successfully purchased the order.

![13](https://user-images.githubusercontent.com/48457036/69577925-6be81f00-0ff5-11ea-8f4d-7d9adac4187f.png)

If multiple products are added in the cart, then if the user click the cancel button then all the products added in the cart will be cancel and the cart will be empty. 

![14](https://user-images.githubusercontent.com/48457036/69577981-8b7f4780-0ff5-11ea-8617-2d4fc9922256.png)

When the user click on the “Cancel” button, then a pop up notification will display above the top of the page which will display a message states that “Your orders are cancelled!!... HAPPY SHOPPING!!..”.

![15](https://user-images.githubusercontent.com/48457036/69578055-a9e54300-0ff5-11ea-8cfb-a46da44c1bf7.png)

From the navigation panel if the user click on the About link, the control will redirect the user to the about us page, where regarding our online shopping website, details are written down.

![16](https://user-images.githubusercontent.com/48457036/69578099-c3868a80-0ff5-11ea-82af-b6b3afb05a0c.png)

If the user click on the contact link given in the navigation panel, then the control will redirect the user to the contact page of our shopping website, which will provide all the necessary information’s and details regarding how to reach to the owner of the shopping site if any sort of queries need to be clear.

![17](https://user-images.githubusercontent.com/48457036/69578146-def19580-0ff5-11ea-82c7-a7ef6b081a20.png)

By clicking the logout link, the control will display a pop up notification, which states that the user has successfully logged out.

![18](https://user-images.githubusercontent.com/48457036/69578181-f92b7380-0ff5-11ea-8ec1-efaf6c27e86c.png)

By clicking the “OK” button the control will redirect the user to the homepage or index page of our online shopping site. Where the user again needs to login if he/she wants to purchase or view any product.


 ##  2. Vendor Module:
When an existing Vendor, provide all the Credentials for login in the correct place. 

![19](https://user-images.githubusercontent.com/48457036/69578809-3b08e980-0ff7-11ea-8fb0-b6a16176391e.png)

After clicking “login” button the control redirect the vendor to the vendor index page of the inventory management system.

![20](https://user-images.githubusercontent.com/48457036/69578874-5a077b80-0ff7-11ea-904c-5e2744f048e2.png)

From the index page if the Vendor clicks on the “ADD NEW PRODUCTS” tab, then the control will redirect the vendor to a new page from where we can insert the products.

![21](https://user-images.githubusercontent.com/48457036/69578919-7acfd100-0ff7-11ea-91f2-e9f230db5f94.png)

 From the vendor index page if we click on the tab “MANAGE PRODUCTS”, then the control will redirect the vendor to a new page from where we can manage the products available under the particular vendor.
 
 ![22](https://user-images.githubusercontent.com/48457036/69578995-9cc95380-0ff7-11ea-9fad-bf3e6aa892d1.png)

If the vendor clocks on the “Edit” button beside every product, then the control will redirect the vendor to a new page from where the vendor can update the information regarding the product.

![23](https://user-images.githubusercontent.com/48457036/69579045-b9fe2200-0ff7-11ea-94cf-356ba7f95156.png)

In the Manage product page if the vendor clicks the “Delete” button beside each product listed in the tabular format, then the data of that product will be deleted from the database of the online shopping site.

![24](https://user-images.githubusercontent.com/48457036/69579287-3b55b480-0ff8-11ea-85f3-23cb1aaaa51a.png)

In the vendor index page if we click on the “TOTAL BUSINESS” tab, then the control will redirect the vendor to the new page, where the total business done by the particular logged in vendor, is written in the Table format, along with the total business.

![25](https://user-images.githubusercontent.com/48457036/69579395-66400880-0ff8-11ea-8b8a-6efded8476f9.png)

By clicking on the drop down present in there panel of the Vendor, labelled “DASH BOARD” the control goes back to the vendor index page.

![26](https://user-images.githubusercontent.com/48457036/69579448-7f48b980-0ff8-11ea-8ceb-9fe276e9b6de.png)

.In the top right corner when we click on the vendor name in the index page a drop down menu arises. From which if we click on settings, then the control will redirect the vendor to the new page from where the vendor can update his/her profile.

![27](https://user-images.githubusercontent.com/48457036/69579503-a0110f00-0ff8-11ea-845c-4b6af483e91c.png)

In the navigation panel of vendor, at the top right corner, if the Vendor clicks over his/her name, then a drop down menu will arise in which there is an option called logout.

![28](https://user-images.githubusercontent.com/48457036/69579561-c040ce00-0ff8-11ea-8278-36600acc1c67.png)

By clicking on the link “logout”, a popup notification will arise at the top of the page with a message, which states that the vendor has successfully logged out from their account, and the control will redirect the Vendor to the login page.

![29](https://user-images.githubusercontent.com/48457036/69579620-e0708d00-0ff8-11ea-99cf-6807b3d0be5c.png)

## 3. Admin Module:
The Admin is mainly plays the role of managing the users and vendors in the inventory management system. The admin profile is pre-registered in the system. 

![30](https://user-images.githubusercontent.com/48457036/69581440-85d93000-0ffc-11ea-8cde-671278ebfc76.png)

When the admin provides the correct login credentials in the correct field of the login page, and click on the “Log in” button, then the  control redirects the index page of the admin account in the inventory management system.

![31](https://user-images.githubusercontent.com/48457036/69581506-a1443b00-0ffc-11ea-8d62-1675700f81d5.png)

When the admin enters the Index page of the inventory management system, then he/she can perform all the operations present in the tabs. When the admin enters the index after successful login, then he can view the request of Vendors which are pending. By clicking the View request.

![32](https://user-images.githubusercontent.com/48457036/69581556-bae58280-0ffc-11ea-828c-fd5952126d11.png)

After clicking on the “VIEW REQUEST” link in the tab, the control redirect the admin to another page from where the admin can see all the pending request of the vendor’s in a tabular format. Beside every vendor request there is an action column, from where admin can either “Accept” the vendor request or by clicking on “Delete” button the admin can delete the pending request of the Vendor.

![33](https://user-images.githubusercontent.com/48457036/69581629-dd779b80-0ffc-11ea-8a99-e5fd7476c8ab.png)

From the admin index page, the admin can also change the active and inactive status by clicking on the “USER REQUEST” link in the tab. When the Admin clicks on the “USER REQUEST” link from the tab, the control redirect the admin to the new page in which the details of all the users are displayed in the tabular format. 

And beside every user detail there is an Action section which consists of two button “Active” and “Inactive”. If the admin clicks on active button beside any user details, if the user was previously inactive, then the user will now become active. But if the user is previously active, then the message will appear that the user is already active. 

![34](https://user-images.githubusercontent.com/48457036/69581739-0b5ce000-0ffd-11ea-8840-68980c79670a.png)

And if the admin clicks on inactive button, if the user is previously active, then the user will be active now. But if the user is previously inactive, then the message will displayed to the admin that the user is already inactive.

![35](https://user-images.githubusercontent.com/48457036/69581796-24659100-0ffd-11ea-837e-89576e456ee9.png)

From the admin index, the admin can also block or delete vendor, by clicking on the “MANAGE VENDOR” link from the tab of the index page.
When the admin clicks on the “MANAGE VENDOR” link, the control redirect the admin to a new page, where all the vendor’s details are displayed in tabular format, along with the action buttons “Block” and “Delete”.

By clicking on the “Block” button the admin can block the Vendor. And after clicking the “Block” button, the vendor data will not  be shown in this page.

![36](https://user-images.githubusercontent.com/48457036/69581878-58d94d00-0ffd-11ea-83a1-59b859262759.png)

By clicking the “Delete” button the Vendor account will be deleted. And also the corresponding data of that particular Vendor will not be displayed in this page.

![37](https://user-images.githubusercontent.com/48457036/69581937-75758500-0ffd-11ea-9214-7e38ecad3315.png)

Admin can also view the total business of all the vendor’s from the admin index page. By clicking the total business tab from the index tab, the control will redirect the admin to new page in which details of all the Vendors sell is displayed in tabular format along with the total sell.

![38](https://user-images.githubusercontent.com/48457036/69581989-96d67100-0ffd-11ea-8cd1-a76548f13e17.png)

In the top right corner, the name of the admin is displayed, by clicking on it, a drop down list will open, in which one of the option is settings. 

![39](https://user-images.githubusercontent.com/48457036/69582031-b2417c00-0ffd-11ea-99eb-e4b967c96474.png)

By clicking on the setting option, the control will redirect the admin to the new page in which all the details of the admin is displayed, from where admin can change its password and update his/her account.

![40](https://user-images.githubusercontent.com/48457036/69582082-d43afe80-0ffd-11ea-96cb-cf1c9b45a327.png)

In the top right corner of the index page, the name of the admin is displayed, by clicking on the name a drop down menu will appear on the screen, which consists of options, among which one option is logout. By clicking the logout option, the control will redirect the admin to the login page from where the user can login again. 

![41](https://user-images.githubusercontent.com/48457036/69582123-eae15580-0ffd-11ea-8f1c-de34f552658b.png)

Since the admin clicked the log out button, so the admin account get logged out and the control is redirected to the login page by displaying the popup notification above the screen, along with a message that states “ADMIN Successfully logged out!!!.......”. By clicking the “OK” button below the pop up notification message, the control redirect the admin to the login page.

![42](https://user-images.githubusercontent.com/48457036/69582186-0cdad800-0ffe-11ea-9eae-5a07df243c04.png)



# Credits:

#### Authors:
  * Niladri Goswami (https://www.linkedin.com/in/niladri-goswami-0972a2118/)
  * Souvik Basu (https://www.linkedin.com/in/souvik-basu-a4a262b5/)
  
  
