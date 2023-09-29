<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bill.css">
    <title>Student Bill</title>
</head>

<body>
    <div class="bill-wrapper">
        <div class="bill-container">
            <div class="billMessage">
                
                <!-- <div class="successful">
                    <p>Billing Process is Successful</p>
                    
                </div> -->
                <!-- <div class="failure">
                    <p>Billing Process Failed!!!</p>

                </div> -->
            </div>
            <hr>
            <div class="company-name">
                <p>ABC Institute</p>
            </div>
            <hr>
            <div class="details-container">
                <div class="billerinfo">
                    <p class="name">Name: Santosh Bhandari</p>
                    <p class="address">Address: Kanakai-07</p>
                    <p class="phone">Number: 9824xxxxxx</p>

                </div>
                <div class="billinfo">
                    <p class="date">Date: 2023-10-23</p>
                    <p class="time">Time: 10:45 AM</p>
                </div>
            </div>
            <div class="billtable">
                <table border="1">
                    <thead>
                        <th>S.N.</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Computer Basic</td>
                            <td>5000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Computer Programming</td>
                            <td>11000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Computer Networking</td>
                            <td>10000</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Computer Hardware</td>
                            <td>9000</td>
                        </tr>
                        <tr class="subtotal">
                            <td colspan="2">Subtotal</td>
                            <td colspan="2">52000</td>
                        </tr>
                        <tr class="discount">
                            <td colspan="2">Discount</td>
                            <td colspan="2">2000</td>
                        </tr>
                        <tr class="total">
                            <td colspan="2">Total Amount</td>
                            <td>50000</td>
                        </tr>
                    </tbody>
                </table>
                <div class="billoptions">
                    <button id="print">Print</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById("print").addEventListener('click',function(e){
        e.target.style.display='None'
        print()
    })
</script>

</html>