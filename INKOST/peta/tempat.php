<?php
 
     // Parsing Karakter-Karakter Khusus
     function parseToXML($htmlStr)
     {
          $xmlStr=str_replace('<','<',$htmlStr);
          $xmlStr=str_replace('>','>',$xmlStr);
          $xmlStr=str_replace('"','"',$xmlStr);
          $xmlStr=str_replace("'",'',$xmlStr);
          $xmlStr=str_replace("&",'&',$xmlStr);
          return $xmlStr;
     }
 
     // Menghubungkan Koneksi dengan server MySQL, ganti bagian $username, $password, dan $database.
	 $koneksi="localhost";
     $username="root";
     $password="";
     $database="inkost";
 
     $connection=mysql_connect ($koneksi, $username, $password);
     if (!$connection) {
          die('Not connected : ' . mysql_error());
          }
 
     // Memilih database MySQL yang aktif
     $db_selected = mysql_select_db($database, $connection);
     if (!$db_selected) {
          die ('Can\'t use db : ' . mysql_error());
          }
 
     // Memilih semua baris pada tabel 'markers2'
     $query = "SELECT * FROM peta WHERE 1";
     $result = mysql_query($query);
     if (!$result) {
          die('Invalid query: ' . mysql_error());
          }
 
     // Header File XML
     header("Content-type: text/xml");
 
     // Parent node XML
     echo '<markers>';
 
     // Iterasi baris, masing-masing menghasilkan node-node XML
     while ($row = @mysql_fetch_assoc($result)){
 
          // Menambahkan ke node dokumen XML
          echo '<marker ';
          echo 'nama="' . parseToXML($row['nama_kost']) . '" ';
          echo 'alamat="' . parseToXML($row['alamat']) . '" ';
          echo 'lat="' . $row['latitude'] . '" ';
          echo 'lng="' . $row['longitude'] . '" ';
 
          echo '/>';
     }
 
     // Akhir File XML (tag penutup node)
     echo '</markers>';
 
?>