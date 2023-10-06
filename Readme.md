# Institute Billing System
## Usage
- Run the Server and Database in your Local Machine.
- Create a Database name with `BillingSystem`;
```sql
CREATE DATABASE BillingSystem;
```
- Create the User With Username `user` and Password `user`
```sql
CREATE  USER 'user'@'localhost' IDENTIFIED BY "user";
```
- Grant all the Permission on the  `BillingSystem` Database to the Created User.
```sql
GRANT ALL PRIVILEGES ON BillingSystem.* TO 'user'@'localhost';
```
- Execute all the Command of `assets/database/BillingSystem.sql` from `localhost/phpmyadmin`
- Now Open the project in your local system. 

##