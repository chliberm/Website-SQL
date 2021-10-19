<?php
include 'top.php';
?> 
<main>   
    <article>
        <h2>Table SQL statements</h2>
        <pre>
        CREATE TABLE tblProducts (
            pmkProductsId INT AUTO_INCREMENT PRIMARY KEY,
            fldProductName varchar(30),
            fldAmount varchar(50),
            fldDecompTime varchar(50)
        );

        INSERT INTO tblProducts (fldProductName, fldAmount, fldDecompTime) VALUES

        ('Coffee Pods', '59 Billion (2019)', 'Biodegrable - 3 yrs, else - 150-500 yrs'),

        ('Cotton Swabs', '543.75 Billion (2017)', '1 - 5 months'),

        ('Sanitary Pads', '~12 Billion', '500 - 800 yrs');
        
        SELECT fldProductName, fldAmount, fldDecompTime FROM tblProducts
        </pre>
    </article>

    <article>
        <h2>Form SQL statements</h2>
        <pre>
        CREATE TABLE tblRecyclingSurvey (
            pmkRecyclingSurveyId INT AUTO_INCREMENT PRIMARY KEY,
            fldFirstName varchar(30),
            fldLastName varchar(30),
            fldCountry varchar(30),
            fldEmail varchar(50), 
            fldAge varchar(15),
            fldProductUse varchar(10),
            fldBite tinyint(1), 
            fldBlueland tinyint(1), 
            fldDivacup tinyint(1), 
            fldOther tinyint(1), 
            fldNone tinyint(1), 
            fldComments text
        );

        INSERT INTO tblRecyclingSurvey
                    (fldFirstName, fldLastName, fldCountry, fldEmail, fldAge, fldProductUse, fldBite, fldBlueland, fldDivacup, fldOther, fldNone, fldComments) 
        VALUES ('Celia', 'Liberman', 'USA', 'chliberm@uvm.edu', '19-25', 'Definitely', '1', '1', '1', '1', '0', 'testing');
        </pre>
    </article>
</main>
<?php
include 'footer.php';
?>
</body>
</html>
        