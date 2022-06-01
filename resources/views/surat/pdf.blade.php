{{-- 
<head>
      <meta charset="UTF-8">
      <title>Surat</title>

      <style type="text/css">
          /* @page {
              margin: 0px;
          } */
          @page {
              /* size: 8.5in 11in;
              margin: .5in; */
            }
          .page-break {
              page-break-after: always;
          }
          html{
            page-break-after: always;
          }
          body {
              margin: 0px;
              line-height: normal;
          }
          * {
              font-family: Verdana, Arial, sans-serif;
          }
          a {
              color: #fff;
              text-decoration: none;
          }
          p{
              margin: 0;
          }
          header{
            background-color: #ffffff;
            color: #000000;
            padding-top: -30px;
            padding-left: -35px;
            /* padding-right: -20px; */
            padding-bottom: 5px;
          }
          /* .invoice table {
              margin: 15px;
          } */
          .information {
              font-size: 12pt;
              line-height: normal;
              margin: 5px;
              background-color: #ffffff;
              color: #000000;
              width: 100%;
              /* margin:113.3858267717px 74.078740157px; */
              margin-left: 50px;
              margin-right: 25px;
              margin-top: 5px;
              margin-bottom: 9.448818898px;
          }
          /* .information {
              background-color: #ffffff;
              color: #000000;
              width: 100%;
              margin:113.3858267717px 74.078740157px;
              /* padding-left: 113.3858267717px;
              padding-right: 74.078740157px;
              padding-top: 75.5905511811px;
              padding-bottom: 9.448818898px; */
              /* margin-left: 113.3858267717px;
              margin-right: 74.078740157px;
              margin-top: 75.5905511811px;
              margin-bottom: 9.448818898px; */
          /* } */
          table{
            font-size: 12pt;
            /* width: 1%; */
            /* table-layout:fixed;
            width:100%;
            overflow-x:auto; */
            /* padding-left: 125px; */
            table-layout: auto;
            width: 100%;
            white-space: normal;
          }
          /* td{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
          }
          tr{
            min-width: 10px;
            width: 20px;
            max-width: 20px;
          } */
      </style>

  </head> --}}

<style>
  .information {
      font-size: 12pt;
      line-height: normal;
      margin: 5px;
      background-color: #ffffff;
      color: #000000;
      width: 100%;
      /* margin:113.3858267717px 74.078740157px; */
      /* margin-left: 40px;
      margin-right: 10px; */
      margin-top: 5px;
      margin-bottom: 9.448818898px;
  }
  table, th, td {
  /* border: 1px solid black; */
  /* width: 100%; */
}
</style>
  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="information">
  {{-- <img src="{{ public_path('img/letterhead.png') }}" width="700px" style="!important"><br> --}}

  <table style="width: 100%;">
    <tr>
      <td rowspan="3" width="95" style="text-align: center;"><img src="{{ public_path('img/logo.png') }}" width="90px"></td>
      <td colspan="2">
        <b style="font-size: 9pt !important;">
          PEJABAT SETIAUSAHA KERAJAAN <br>NEGERI SELANGOR DARUL EHSAN,<br> UNIT PERANCANG NEGERI EKONOMI NEGERI,<br> SEKSYEN PIHAK BERKUASA TEMPATAN,
        </b>
      </td>
    </tr>
    <tr>
      <td rowspan="2" width="250">
        <span style="font-size: 9pt !important;">
          TINGKAT 4,<br>BANGUNAN SULTAN SALAHUDDIN ABDUL AZIZ SHAH,<br> 40503 SHAH ALAM,<br> SELANGOR DARUL EHSAN.
        </span>
      </td>
      <td ></td>
    </tr>
    <tr>
      <td>
        <span style="font-size: 6pt !important;">
          Tel: 603-5544 7100 <br>
          Faks: 603-5510 1748 <br>
          Laman web: http://upen.selangor.gov.my/
        </span>
      </td>
    </tr>
    <tr>
      <td colspan="3"><hr style="border: black; margin-top: 0px;"></td>
    </tr>
  </table>

  <table style="width: 800">
        <tr>
          <td></td>
          <td class="text-right">
            (    )dlm.IPK.Sel.SPBT<br>
            700-9/2 Jld.<br>
            {{ date("d F Y") }}<br>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>{{ $permohonan->rumah_ibadat->name_association }}</b><br>
            {{-- {{ $permohonan->rumah_ibadat->address }},<br> --}}
            @foreach ($address as $key => $data)
            {{ $data }},<br>
            @endforeach
            {{ $permohonan->rumah_ibadat->postcode }} 
            {{ $permohonan->rumah_ibadat->district }},<br>
            SELANGOR.
          </td>
        </tr>
        <tr>
          <td colspan="2" style="padding-top: 15px;">Tuan / Puan, </td>
        </tr>
        <tr>
          <td colspan="2" style="padding-top: 15px;"><b>KELULUSAN PEMBAYARAN BANTUAN RUMAH IBADAT SELAIN ISLAM DI NEGERI SELANGOR </b></td>
        </tr>
        <tr>
          <td colspan="2"><hr style="border: black; margin-top: 0px;"></td>
        </tr>
        <tr>
          <td colspan="2">Dengan segala hormatnya saya diarah merujuk kepada perkara di atas.</td>
        </tr>
        <tr>
          <td colspan="2" style="padding-top: 15px; text-align: justify; text-justify: inter-word;">2.	Adalah dimaklumkan bahawa Jawatankuasa Khas Hal Ehwal Agama Buddha, Tao, Hindu, Kristian Dan Sikh Negeri Selangor (LIMAS) telah meluluskan permohonan Bantuan Rumah Ibadat Selain Islam Negeri Selangor seperti butiran berikut :</td>
        </tr>
        <tr>
          <td width="50"></td>
          <td style="padding-top: 15px;">Nama Persatuan: <b>{{ $permohonan->rumah_ibadat->name_association }}</b></td>
        </tr>
        <tr>
          <td width="50"></td>
          <td>Jumlah Kelulusan	: <b>RM{{ number_format($permohonan->total_fund, 2) }}</b></td>
        </tr>
        <tr>
          <td width="50"></td>
          <td>Nama Bank		: <b>{{ $permohonan->rumah_ibadat->bank_name }}</b></td>
        </tr>
        <tr>
          <td width="50"></td>
          <td>No. Akaun Bank	: <b>{{ $permohonan->rumah_ibadat->bank_account }}</b></td>
        </tr>
        <tr>
          <td width="50"></td>
          <td>No. Telefon	Pemohon	: <b>{{ $permohonan->rumah_ibadat->office_phone ?? '-' }}</b></td>
        </tr>
        <tr>
          <td colspan="2" style="padding-top: 15px; text-align: justify; text-justify: inter-word;">3.	Sehubungan itu, pihak Tuan / Puan adalah dipohon untuk menghubungi Pejabat YB Exco yang berkaitan untuk urusan selanjutnya.</td>
        </tr>
        <tr>
          <td colspan="2" style="padding-top: 15px; text-align: justify; text-justify: inter-word;">4.	Kerjasama dan perhatian daripada pihak Tuan / Puan dalam perkara ini amat dihargai dan didahului dengan ucapan terima kasih.</td>
        </tr>
        <tr>
          <td colspan="2" style="padding-top: 15px; text-align: justify; text-justify: inter-word;">Sekian.</td>
        </tr>
        <tr>
          <td colspan="2" class="text-center" style="padding-top: 40px; text-align: justify; text-justify: inter-word; font-size: 10pt;"><b>Surat ini adalah cetakan komputer. Tiada tandatangan diperlukan.</b></td>
        </tr>
      </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

