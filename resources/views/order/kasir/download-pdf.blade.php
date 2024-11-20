<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembelian</title>
    <style>
        /* Styling umum */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        #back-wrap {
            margin: 20px auto;
            width: 500px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back {
            padding: 8px 12px;
            color: #fff;
            background: #666;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
        }

        #receipt {
            box-shadow: 4px 8px 12px rgba(0, 0, 0, 0.3);
            padding: 20px;
            margin: 20px auto;
            width: 450px;
            background: #FFF;
            border: 1px solid #DDD;
        }

        h2 {
            font-size: 1.2rem;
            text-align: center;
            margin: 10px 0;
        }

        p {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4rem;
        }

        #top {
            margin-top: 20px;
        }

        #top .info {
            text-align: center;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #EEE;
        }

        .tabletitle {
            background: #F5F5F5;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .itemtext {
            font-size: 0.9rem;
        }

        #legalcopy {
            margin-top: 10px;
            font-size: 0.8rem;
            color: #888;
            text-align: center;
        }

        /* Tombol Cetak */
        .btn-print {
            float: right;
            color: #333;
            font-size: 0.9rem;
            text-decoration: underline;
            cursor: pointer;
        }

        /* Tampilan cetak */
        @media print {
            #back-wrap, .btn-print {
                display: none;
            }

            #receipt {
                width: 100%;
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>

<body>
<div id="back-wrap">
    <!-- <a href="{{ route('pembelian') }}" class="btn-back">Kembali</a> -->
</div>
<div id="receipt">
    <!-- <a href="#" class="btn-print" onclick="window.print()">Cetak (.pdf)</a> -->
    <center id="top">
        <div class="info">
            <h2>Apotek Jaya Abadi</h2>
        </div>
    </center>
    <div id="mid">
        <div class="info">
            <p>
                Alamat: Sepanjang Jalan Kenangan <br>
                Email: apotekjayaabadi@gmail.com <br>
                Telepon: 000-111-2222<br>
            </p>
        </div>
    </div>
    <div id="bot">
        <table>
            <tr class="tabletitle">
                <th>Obat</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
            @foreach ($order['medicines'] as $medicine)
            <tr>
                <td class="itemtext">{{ $medicine['name_medicine'] }}</td>
                <td class="itemtext">{{ $medicine['qty'] }}</td>
                <td class="itemtext">Rp. {{ number_format($medicine['price'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
            @php
                        $ppn = $order['total_price'] * 0.01;
                    @endphp
            <tr class="tabletitle">
                <td colspan="2">PPN (10%)</td>
                <td>Rp. {{ number_format($ppn, 0, ',', '.') }}</td>
            </tr>
            <tr class="tabletitle">
                <td colspan="2">Total Harga</td>
                <td>Rp. {{ number_format($order['total_price'], 0, ',', '.') }}</td>
            </tr>
        </table>
        <div id="legalcopy">
            <p><strong>Terima kasih atas pembelian Anda!</strong> Kami menghargai kepercayaan Anda pada Apotek Jaya Abadi.</p>
        </div>
    </div>
</div>
</body>

</html>
