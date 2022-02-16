<?php
    require_once "database.php";
    
    $sql_drop = "DROP TABLE reservedbook";

    if($conn->query($sql_drop) === TRUE) {
        echo "Drop RESERVED BOOKS table Successfully" . "<br>";
    } else {
        echo "Drop RESERVED BOOKS table Unsuccessful: " . $sql_drop . "<br>" . $conn->error . "<br>";
    }

    $sql_drop = "DROP TABLE librarymember";

    if($conn->query($sql_drop) === TRUE) {
        echo "Drop Member table Successfully" . "<br>";
    } else {
        echo "Drop Member table Unsuccessful: " . $sql_drop . "<br>" . $conn->error . "<br>";
    }

    $sql_drop = "DROP TABLE books";

    if($conn->query($sql_drop) === TRUE) {
        echo "Drop BOOKS table Successfully" . "<br>";
    } else {
        echo "Drop BOOKS table Unsuccessful: " . $sql_drop . "<br>" . $conn->error . "<br>";
    }

    $sql_drop = "DROP TABLE category";

    if($conn->query($sql_drop) === TRUE) {
        echo "Drop CATEGORY table Successfully" . "<br>";
    } else {
        echo "Drop CATEGORY table Unsuccessful: " . $sql_drop . "<br>" . $conn->error . "<br>";
    }   

    $sql = "CREATE TABLE librarymember (
        Username VARCHAR(50),
        Password VARCHAR(50),
        FirstName VARCHAR(50),
        Surname VARCHAR(50),
        AddressLine1 VARCHAR(50),
        AddressLine2 VARCHAR(50),
        City VARCHAR(50),
        Telephone VARCHAR(10),
        Mobile VARCHAR(10),

        PRIMARY KEY (Username)
    )";

    if($conn->query($sql) === TRUE) {
    echo "Create USERS table Successfully" . "<br>";
    } else {
        echo "Create USERS table Unsuccessful: " . $sql . "<br>" . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE category (
        CategoryID VARCHAR(3),
        CategoryType VARCHAR(10),

        CONSTRAINT category_ID_PK PRIMARY KEY (CategoryID)
    )";

    if($conn->query($sql) === TRUE) {
        echo "Create CATEGORY table Successfully" . "<br>";
    } else {
        echo "Create CATEGORY table Unsuccessful: " . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE books (
        ISBN VARCHAR(50),
        BookTitle VARCHAR(50),
        Author VARCHAR(50),
        Edition INT(1),
        Year INT(4),
        CategoryID VARCHAR(3),
        Reserved VARCHAR(1),

        CONSTRAINT isbn_pk PRIMARY KEY (ISBN) ,
        CONSTRAINT category_ID_FK FOREIGN KEY (CategoryID) REFERENCES category(CategoryID)
    )";

    if($conn->query($sql) === TRUE) {
        echo "Create BOOKS table Successfully" . "<br>";
    } else {
        echo "Create BOOKS table Unsuccessful: " . $conn->error . "<br>";
    }

    $sql = "CREATE TABLE reservedbook (
        ISBN VARCHAR(50),
        Username VARCHAR(50),
        ReservedDate DATE,

        CONSTRAINT isbn_fk FOREIGN KEY (ISBN) REFERENCES books(ISBN) ,
        CONSTRAINT username_FK FOREIGN KEY (Username) REFERENCES librarymember(Username)
    )";

    if($conn->query($sql) === TRUE) {
        echo "Create RESERVED BOOKS table Successfully" . "<br>";
    } else {
        echo "Create RESERVED BOOKS table Unsuccessful: " . $conn->error . "<br>";
    }

 
    $sql_insert = "INSERT INTO librarymember (Username, Password, FirstName, Surname, AddressLine1, AddressLine2, City, Telephone, Mobile)
        VALUES ('joecrotty', 'kj7899', 'Joseph', 'Crotty', 'Apt 5 Clyde Road', 'Donnybrook', 'Dublin', 8887889, 876654456),
                ('tommy100', '123456', 'tom', 'behan', '14 hyde road', 'dalkey', 'Dublin', 99983747, 876738782)";

    if($conn->query($sql_insert) === TRUE) {
        echo "User input Successfully" . "<br>";
    } else {
        echo "User input Unsuccessful: " . $sql_insert . "<br>" . $conn->error . "<br>";
    }

    $sql_insert = "INSERT INTO category (CategoryID, CategoryType)
        VALUES  ('001', 'Health'), 
                ('002', 'Business'),
                ('003', 'Biography'),
                ('004', 'Technology'),
                ('005', 'Travel'),
                ('006', 'Self-Help'),
                ('007', 'Cookery'),
                ('008', 'Fiction')";


    if($conn->query($sql_insert) === TRUE) {
        echo "Category input Successfully" . "<br>";
    } else {
        echo "Category input Unsuccessful: " . $sql_insert . "<br>" . $conn->error . "<br>";
    }

    $sql_insert = "INSERT INTO books (ISBN, BookTitle, Author, Edition, Year, CategoryID, Reserved) 
        VALUES  ('1', 'Computers in Business', 'Alicia Oneill', 3, 1997, '003', 'N'), 
                ('2', 'Exploring Peru', 'Stephanie Birch', 4, 2005, '005', 'N'),
                ('3', 'Business Strategy', 'Joe Peppard', 2, 2002, '002', 'N'),
                ('4', 'A guide to nutrition', 'John Thorpe', 2, 1997, '001', 'N'),
                ('5', 'Cooking for children', 'Anabelle Sharpe', 1, 2003, '007', 'N'),
                ('6', 'computers for idiots', 'Susan ONeill', 5, 1998, '002', 'N'), 
                ('7', 'My life in picture', 'Kevin Graham', 8, 1998, '002', 'N'),
                ('8', 'DaVinci Code', 'Dan Brown', 1, 2003, '008', 'N'),
                ('9', 'My ranch in Texas', 'George Bush', 1, 2005, '001', 'Y'),
                ('10', 'How to cook Italian food', 'Jamie Oliver', 2, 2003, '007', 'Y'), 
                ('11', 'Optimising your business', 'Cleo Blair', 1, 2001, '002', 'N'),
                ('12', 'Tara Road', 'Maeve Binchy', 4, 2002, '008', 'N'),
                ('13', 'My life in bits', 'John Smith', 1, 2001, '001', 'N'),
                ('14', 'Shooting History', 'Jon Snow', 1, 2003, '001', 'N')"; 
                
    if($conn->query($sql_insert) === TRUE) {
        echo "Book input Successfully" . "<br>";
    } else {
        echo "Book input Unsuccessful: " . $sql_insert . "<br>" . $conn->error . "<br>";
    }
    
    $sql_insert = "INSERT INTO reservedbook (ISBN, Username, ReservedDate)
                    VALUES  ('9', 'joecrotty', STR_TO_DATE('2017,11,10', '%Y,%c,%d')), 
                            ('10', 'tommy100', STR_TO_DATE('2017,11,10', '%Y,%c,%d'))";

    if($conn->query($sql_insert) === TRUE) {
        echo "Reserved books input Successfully" . "<br>";
    } else {
        echo "Reserved books Unsuccessful: " . $sql_insert . "<br>" . $conn->error . "<br>";
    }
    $conn->close();

?>

