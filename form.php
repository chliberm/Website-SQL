<?php
include 'top.php';

// Displays errors - remove code when done
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
$dataIsGood = false;
$firstName = "";
$lastName = "";
$country = "";
$email = "";
$age = "0-18";
$useRefillCont = "Definitely" ;
$bite = true;
$blueland = true;
$divacup = true;
$otherProd = false;
$noneProd = false;
$comments = "";

// function to check text and numbers
function verifyAlphaNum($testString) {
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

// Sanatize function from the text
function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}
?>
<main class=".formPos">
    <article>
        <?php
        print '<p>Post Array:</p><pre>';
        print_r($_POST);
        print '</pre>';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dataIsGood = true;

            $firstName = getData("txtFirstName");
            $lastName = getData("txtLastName");
            $country = getData("txtCountry");
            $email = getData("txtEmail");
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $age = getData("lstAge");
            $useRefillCont = getData("radUseRefillCont");
            $bite = (int)getData("chkBiteToothpaste");
            $blueland = (int)getData("chkBluelandCleaning");
            $divacup = (int)getData("chkDivaCup");
            $otherProd = (int)getData("chkOther");
            $noneProd = (int)getData("chkNone");
            $comments = getData("txtComments");

            // Server side validation
            if ($firstName == "") {
                print '<p class="mistake">Please enter your first name.</p>';
                $dataIsGood = false;
            } elseif (!verifyAlphaNum($firstName)) {
                print '<p class="mistake">Your first name appears to have an illegal character.</p>';
                $dataIsGood = false;
            }

            if ($lastName == "") {
                print '<p class="mistake">Please enter your last name.</p>';
                $dataIsGood = false;
            } elseif (!verifyAlphaNum($lastName)) {
                print '<p class="mistake">Your last name appears to have an illegal character.</p>';
                $dataIsGood = false;
            }

            if ($country == "") {
                print '<p class="mistake">Please enter your country.</p>';
                $dataIsGood = false;
            } elseif (!verifyAlphaNum($country)) {
                print '<p class="mistake">Your country appears to have an illegal character.</p>';
                $dataIsGood = false;
            }

            if ($email == "") {
                print '<p class="mistake">Please enter your email address.</p>';
                $dataIsGood = false;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                print '<p class="mistake">Your email address appears to be incorrect.</p>';
                $dataIsGood = false;
            }

            if ($age == "") {
                print '<p class="mistake>Please choose an age range.</p>';
                $dataIsGood = false;
            }

            if ($useRefillCont != "Definitely" AND $useRefillCont != "Nope" AND $useRefillCont != "Maybe") {
                print '<p class="mistake">Please choose a valid response for use of refillable containers.</p>';
                $dataIsGood = false;
            }

            $totalChecked = $bite + $blueland + $divacup + $otherProd + $noneProd;
            if ($totalChecked < 1) {
                print '<p class="mistake">Please choose at least one of the checkboxes for products.</p>';
                $dataIsGood = false;
            }

            if($comments != "") {
                if (!verifyAlphaNum($comments)) {
                    print '<p class="mistake">Your comments appear to have at least one illegal character.</p>';
                    $dataIsGood = false;
                }
            }

            if ($dataIsGood) {
                try {
                    $sql = 'INSERT INTO tblRecyclingSurvey
                    (fldFirstName, fldLastName, fldCountry, fldEmail, fldAge, fldProductUse, fldBite, fldBlueland, fldDivacup, fldOther, fldNone, fldComments) 
                    VALUES (?,?,?,?,?,?,?,?)';
                    $statement = $pdo->prepare($sql);
                    $params = array($firstName, $lastName, $country, $email, $age, $useRefillCont, $bite, $blueland, $divacup, $otherProd, $noneProd, $comments);

                    if ($statement->execute($params)) {
                        print '<p>Record was successfully saved.</p>';
                    } else {
                        print '<p>Record was NOT successfully saved.</p>';
                    }
                    
                } catch (PDOExecption $e) {
                    print '<p>Couldn\'t insert the record.</p>';
                } // end try
            } // ends data is good
        } // ends form was submitted

        if($dataIsGood) {
            print '<h2>Thank you, your information has been received.</h2>';
        }
        ?>
    </article>

    <form action="#" method="POST">
        <!--Contact info-->
        <fieldset class="contact">
            <legend>Contact Information</legend>
            <p>
                <label for="txtFirstName">First Name:</label>
                <input type="text" 
                       name="txtFirstName" 
                       id="txtFirstName"
                       maxlength="45"
                       onfocus="this.select()"
                       tabindex="100"
                       value="<?php print $firstName; ?>"
                       required>
            </p>

            <p>
                <label for="txtLastName">Last Name:</label>
                <input type="text" 
                       name="txtLastName" 
                       id="txtLastName"
                       maxlength="45"
                       onfocus="this.select()"
                       tabindex="100"
                       value="<?php print $lastName; ?>"
                       required>
            </p>

            <p>
                <label for="txtCountry">Your Country:</label>
                <input type="text" 
                       name="txtCountry" 
                       id="txtCountry"
                       maxlength="45"
                       onfocus="this.select()"
                       tabindex="100"
                       value="<?php print $country; ?>"
                       required>
            </p>

            <p>
                <label for="txtEmail">Email:</label>
                <input type="email"
                       name="txtEmail" 
                       id="txtEmail"
                       maxlength="50"
                       onfocus="this.select()"
                       tabindex="120"
                       value="<?php print $email; ?>"
                       required>
            </p>
        </fieldset>

        <!--Demographics-->
        <fieldset class="demographics">
            <legend>Age</legend>
            <p>
                <select name="lstAge">
                    <option value="0-18" <?php if ($age == "0-18") print 'selected'; ?>>0-18</option>
                    <option value="19-25" <?php if ($age == "19-25") print 'selected'; ?>>19-25</option>
                    <option value="26-40" <?php if ($age == "26-40") print 'selected'; ?>>26-40</option>
                    <option value="41-65" <?php if ($age == "41-65") print 'selected'; ?>>41-65</option>
                    <option value="66+" <?php if ($age == "66+") print 'selected'; ?>>66+</option>
                </select>
            </p>
        </fieldset>

        <!--about recycling-->
        <fieldset class="refillCont">
            <legend>Would you use a product with a refillable container?</legend>
            <p>
                <input type="radio" name="radUseRefillCont" id="radYesUseRefillCont" value="Definitely"
                       <?php if ($useRefillCont == "Definitely") print 'checked'; ?> required>
                <label for="radYesUseRefillCont">Definitely</label>
            </p>

            <p>
                <input type="radio" name="radUseRefillCont" id="radNoUseRefillCont" value="Nope"
                       <?php if ($useRefillCont == "Nope") print 'checked'; ?> required>
                <label for="radNoUseRefillCont">Nope</label>
            </p>

            <p>
                <input type="radio" name="radUseRefillCont" id="radMaybeUseRefillCont" value="Maybe"
                       <?php if ($useRefillCont == "Maybe") print 'checked'; ?> required>
                <label for="radMaybeUseRefillCont">Maybe</label>
            </p>
        </fieldset>

        <fieldset class="products">
            <legend>Select any products with refillable containers that you would use:</legend>
            <p>
                <input type="checkbox" 
                       id="chkBiteToothpaste" 
                       name="chkBiteToothpaste" 
                       value="1"
                       <?php if ($bite) print 'checked'; ?>>
                <label for="chkBiteToothpaste">Bite - Toothpaste tablets</label>
            </p>

            <p>
                <input type="checkbox" 
                       id="chkBluelandCleaning" 
                       name="chkBluelandCleaning" 
                       value="1"
                       <?php if ($blueland) print 'checked'; ?>>
                <label for="chkBluelandCleaning">Blueland - Cleaning product tablets</label>
            </p>

            <p>
                <input type="checkbox" 
                       id="chkDivaCup" 
                       name="chkDivaCup" 
                       value="1"
                       <?php if ($divacup) print 'checked'; ?>>
                <label for="chkDivaCup">Diva Cup - Reusable menstrual cup</label>
            </p>
            
            <p>
                <input type="checkbox" 
                       id="chkOther" 
                       name="chkOther" 
                       value="0"
                       <?php if ($otherProd) print 'checked'; ?>>
                <label for="chkOther">Other products</label>
            </p>

            <p>
                <input type="checkbox" 
                       id="chkNone" 
                       name="chkNone" 
                       value="0"
                       <?php if ($noneProd) print 'checked'; ?>>
                <label for="chkNone">None</label>
            </p>
        </fieldset>

        <!--Additional comments-->
        <fieldset class="comments">
            <p>
                <label for="txtComments">Comments</label>
                <textarea id="txtComments" 
                          name="txtComments"
                          onfocus="this.select()"><?php print $comments; ?></textarea>
            </p>
        </fieldset>

        <!--Submit button-->
        <fieldset>
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Register">
        </fieldset>
    </form>
</main>

<?php
include 'footer.php';
?>

</body>
</html>