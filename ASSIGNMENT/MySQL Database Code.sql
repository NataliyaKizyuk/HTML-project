SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS phone_customer;
CREATE TABLE IF NOT EXISTS phone_customer (
  Customer_Id int(7) NOT NULL,
  "Name" varchar(20) NOT NULL,
  Address varchar(80) NOT NULL,
  Email varchar(50) NOT NULL,
  Username varchar(15) NOT NULL,
  "Password" varchar(15) NOT NULL,
  PRIMARY KEY (Customer_Id),
  UNIQUE KEY Email (Email,Username),
  UNIQUE KEY Customer_Id (Customer_Id),
  UNIQUE KEY Username (Username),
  UNIQUE KEY "Password" ("Password")
) AUTO_INCREMENT=108 ;

INSERT INTO phone_customer (Customer_Id, `Name`, Address, Email, Username, `Password`) VALUES
(101, 'Sara White', '''65 Auburn Avenue, Dublin 15''', 'Sara.White@mail.com', 'saraw', '1234321'),
(102, 'John', 'Black', 'john.black@mail.ru', 'johnb', '0987890'),
(103, 'Nataliya Kizyuk', 'Dublin', 'nata@gmail.com', 'natafayda', '010101'),
(105, 'Nataliya Fayda', 'Castleknock', 'nataliyakizyuk@gmail.com', 'nkizyuk', '0102030405'),
(106, 'Joshua Bery', 'Dublin, Blackrock', 'joshua@mail.com', 'jbery', '123456789');

DROP TABLE IF EXISTS phone_description;
CREATE TABLE IF NOT EXISTS phone_description (
  Phone_Name varchar(30) NOT NULL,
  Phone_Brand varchar(30) NOT NULL,
  Manufacturer varchar(30) NOT NULL,
  Phone_Storage varchar(30) NOT NULL,
  Phone_Cost float NOT NULL,
  Account_Price float NOT NULL,
  PRIMARY KEY (Phone_Name)
);

INSERT INTO phone_description (Phone_Name, Phone_Brand, Manufacturer, Phone_Storage, Phone_Cost, Account_Price) VALUES
('''Galaxy Core Prime''', '''Samsung Galaxy Core Prime''', '''Samsung''', '''16GB''', 99.99, 29.99),
('''Galaxy Grand Prime''', '''Samsung Galaxy Grand Prime''', '''Samsung''', '''34GB''', 129.99, 39.99),
('''Galaxy S6''', '''Samsung Galaxy S6''', '''Samsung ''', '''32GB''', 559.99, 99.99),
('''Iphone 6''', '''APPLE Iphone 6 ''', '''APPLE''', '''16GB''', 669.99, 109.99),
('''Iphone 6S''', ' ''APPLE Iphone 6S''''', '''APPLE ''', '''16GB''', 699.99, 119.99),
('''Lumia 635''', '''Nokia Lumia 635''', '''Nokia''', '''16GB''', 69.99, 19.99),
('''M4 Aqua''', '''Sony M4Aqua''', '''Sony''', '''8GB''', 199.99, 49.99),
('''One AG''', ' ''HTC one AG''', '''HTC''', '''16GB''', 529.99, 89.99);

DROP TABLE IF EXISTS price_list;
CREATE TABLE IF NOT EXISTS price_list (
  type_of_service varchar(50) NOT NULL,
  unit_cost decimal(3,2) NOT NULL,
  unit_size int(5) NOT NULL,
  unit_type varchar(20) NOT NULL,
  PRIMARY KEY (type_of_service),
  KEY type_of_service (type_of_service),
  KEY type_of_service_2 (type_of_service),
  KEY type_of_service_3 (type_of_service),
  KEY type_of_service_4 (type_of_service)
);

INSERT INTO price_list (type_of_service, unit_cost, unit_size, unit_type) VALUES
('''International Data Usage''', 4.00, 1, '''Day'''),
('''International Phone Call''', 1.00, 1, ''' Minute'''),
('''International Text Message''', 0.50, 50, ''' Characters '''),
('''Local Data Usage''', 1.00, 1, '''Day'''),
('''Local Phone Call''', 0.05, 1, ''' Minute'''),
('''Local Text Message''', 0.00, 50, ''' Characters '''),
('''Overseas Phone Call''', 0.20, 1, '''Minute'''),
('''Overseas Text Message''', 0.10, 50, ''' Characters ''');

DROP TABLE IF EXISTS stores;
CREATE TABLE IF NOT EXISTS stores (
  Store_Id int(7) NOT NULL,
  Store_Address varchar(80) NOT NULL,
  Phone_Number varchar(15) NOT NULL,
  PRIMARY KEY (Store_Id)
);

INSERT INTO stores (Store_Id, Store_Address, Phone_Number) VALUES
(401, '''Liffey Valley Shopping Centre 20 Fonthill Road''', '''(01) 652 6608'''),
(402, '''Donaghmede Shopping Centre Unit 11 Level 2''', '''(01) 823 8734'''),
(403, '''Dun Laoghaire 75 George Street Lower''', '''(01) 623 8743'''),
(404, '''Liffey Valley Shopping Centre Unit 40a''', '''(01) 683 8098'''),
(405, '''43 Grafton Street Dublin 2''', '''(01) 671 8239'''),
(406, '''Dundrum Town Centre Unit 14a Level 3''', '''(01) 664 3530'''),
(407, '''Blanchardstown Shopping Centre Level 1''', '''(01) 616 7407'''),
(408, '''Santry Swords Rd 25''', '''(01) 670 5577''');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
