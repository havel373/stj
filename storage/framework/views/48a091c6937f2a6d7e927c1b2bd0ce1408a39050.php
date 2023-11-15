<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        *, body {
            padding: 0;
            margin: 0;
            box-sizing: border-box
        }
        body {
            width: 100%;
            height: 100vh;
            display: grid;
            place-items: center;
            overflow: auto;
            font-family: Arial, Helvetica, sans-serif;
        }

        .text-end {
           float: right;
        }

        .main-invoice{
            width: 100%;
            padding: 10px 70px;
            min-height: 595px;
        }

        .main-invoice__title {
            margin-top: 50px;
            font-size: 48px;
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            margin-bottom: 2rem;
            text-transform: uppercase;
        }

        .main-invoice__metadata {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-block-end: 50px;
        }
        .main-invoice__metadata__left {
            min-width: 200px;
            height: auto;
        }
        .main-invoice__metadata__right {
            min-width: 200px;
            height: auto;
        }
        .main-invoice__metadata__right_table tr td:nth-child(1){
            padding-right: 12px;
        }

        .main-invoice__table-container {
            position: relative;
            margin-bottom: 50px;
        }

        .main-invoice__table-container__table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
            border: 2px solid black;
        }
        .main-invoice__table-container__table thead {
            background: #ccc;
        }
        .main-invoice__table-container__table thead tr th,
        .main-invoice__table-container__table tbody tr td {
            border-right: 2px solid black;
            border-bottom: 2px solid black;
            text-align: center;
        }
        .main-invoice__table-container__table tbody tr td:nth-last-child(2){
            text-align: start;
            padding: 4px;
        }
        .main-invoice__table-container__table2 {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
        }

        .main-invoice__table-container__table2 tr td:nth-child(n){
            border-right: 2px solid black;
        }

        .main-invoice__table-container__table2 tr td:nth-child(n+2){
            border-bottom: 2px solid black;
            padding: 4px;
        }

        .main-invoice__table-container__value {
            position: absolute;
            bottom: -10%;
            right: 0;
        }

        .main-invoice__signature {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-block-end: 30px;
        }

        .main-invoice__signature__left {
            padding: 10px;
            border: 2px solid black;
            font-weight: bold;
            width: 500px;
        }

        .main-invoice__signature__right {
            width: 300px;
        }

        .main-invoice__signature__space {
            width: 100px;
            height: 130px;
        }
    </style>
</head>
<body>
    <main class="main-invoice">
        <h1 class="main-invoice__title">Invoice</h1>
        <div class="main-invoice__metadata">
            <div class="main-invoice__metadata__left">
                <p>Kepada Yth.</p>
                <p>
                    <strong>PT Ajidharma Corporindo</strong>
                </p>
                <p>
                    <strong>Jl. Danau Sunter Selatan Blok O IV Kav. 25-26</strong>
                </p>
                <p>Sunter Jaya</p>
                <p>Jakarta</p>
            </div>
            <div class="main-invoice__metadata__right">
               <table class="main-invoice__metadata__right_table">
                    <tr>
                        <td>Invoice</td>
                        <td>444/INV/BML/08/23</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>28 Maret 2023</td>
                    </tr>
                    <tr>
                        <td>Due Date</td>
                        <td>12 April 2023</td>
                    </tr>
               </table>
            </div>
        </div>

        <div class="main-invoice__table-container">
            <table class="main-invoice__table-container__table">
                <thead>
                <tr>
                        <th width="30px">No</th>
                        <th>Tanggal PO</th>
                        <th width="190px">NOMOR PO</th>
                        <th width="240px">CUSTOMER</th>
                        <th>TUJUAN</th>
                        <th>UNIT</th>
                        <th>NO POL</th>
                        <th>RATE</th>
                        <th>Accessorial Cost (unloading, overnight, multidrop, etc)</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>23-Mar-23</td>
                        <td>0449/AC-Log/03/2023</td>
                        <td >PT AICE ICE CREAM JATIM INDUS</td>
                        <td>MOJOKERTO</td>
                        <td>CDDL</td>
                        <td>B 9162 FXX</td>
                        <td>Rp <span class="text-end">3.600.000</span></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <table class="main-invoice__table-container__table2">
                <tr>
                    <td colspan="6"></td>
                    <td>
                        <strong>TOTAL</strong>
                    </td>
                    <td>
                        Rp <span class="text-end">3.600.000</span>
                    </td>
                    <td>Rp <span class="text-end">-</span></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td>
                        <strong>Total</strong>
                    </td>
                    <td></td>
                    <td> Rp <span class="text-end">3.600.000</span></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td>
                        <strong>Vat 11%</strong>
                    </td>
                    <td></td>
                    <td> Rp <span class="text-end">396.000</span></td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td>
                        <strong>Grand Total</strong>
                    </td>
                    <td></td>
                    <td>
                        <strong>Rp <span class="text-end">3.996.000</span></strong>
                    </td>
                </tr>
            </table>
            <i class="main-invoice__table-container__value">"Tiga juta sembilan ratus sembilan puluh enam ribu rupiah"</i>
        </div>

        <div class="main-invoice__signature">
            <div class="main-invoice__signature__left">
                <p>Note :</p>
                <p>Mohon dibayarkan ke rekening  :</p>
                <p>BRI norek 0377-01-001852-30-2</p>
                <p>an. PT Bintang Makmur Logistik</p>
                <p>Mohon dicantumkan informasi nomor Invoice pada</p>
                <p>saat pembayaran</p>
            </div>
            <div class="main-invoice__signature__right">
                <center>Jakarta, 5 Maret 2023</center>
                <center>Hormat kami</center>
                <center>
                    <strong>PT Bintang Makmur Logistik</strong>
                </center>
                <div class="main-invoice__signature__space"></div>
                <center>
                    <strong>Djintar Situmorang</strong>
                </center>
                <center>Direktur Utama</center>
            </div>
        </div>
    </main>
</body>
</html><?php /**PATH C:\laragon\www\stj.sweatboxfnp.com\resources\views/pages/web/monitoring/invoice.blade.php ENDPATH**/ ?>