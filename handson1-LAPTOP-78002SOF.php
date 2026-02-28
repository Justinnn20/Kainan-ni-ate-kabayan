<!DOCTYPE html>
<html>
<head>
    <title>Hands on 1</title>
</head>
<body>

    <form action="#" method="post">
        
        <fieldset>
            <legend>Basic Information</legend>
            <ol>
                <li>Name: <input type="text" placeholder="Last Name, First Name MI."></li>
                <li>Email: <input type="email" placeholder="example@example.com"></li>
                <li>Phone: <input type="text" placeholder="+639000000000"></li>
            </ol>
        </fieldset>

        <fieldset>
            <legend>Home Address</legend>
            <ol>
                <li>Address: <br> <textarea rows="4" cols="30"></textarea></li>
                <li>Post code: <input type="text"></li>
                <li>Country: <input type="text"></li>
            </ol>
        </fieldset>

        <fieldset>
            <legend>Type of Payment</legend>
            <ol>
                <li>
                    <fieldset>
                        <legend>Payment</legend>
                        <ol>
                            <li><input type="radio" name="pay_method"> Credit</li>
                            <li><input type="radio" name="pay_method"> Cash</li>
                            <li><input type="radio" name="pay_method"> Gcash</li>
                        </ol>
                    </fieldset>
                </li>
                <li>Account Number: <input type="text"></li>
                <li>Account Name: <input type="text" placeholder="Exact Details"></li>
                <li>Amount: <input type="text" placeholder="Exact Amount"></li>
            </ol>
        </fieldset>

        <fieldset>
            <input type="submit" value="Submit">
        </fieldset>

    </form>

</body>
</html>+