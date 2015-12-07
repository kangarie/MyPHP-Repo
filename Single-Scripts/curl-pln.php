 <?php  
$ch = curl_init(); 
$binary = "7|0|7|http://layanan.pln.co.id/ebill/FormInfoRekening/|31FCED6DBB5E158989E9AD8E99085D6D|com.iconplus.client.services.TransService|getInvoiceByIdpelThblrek|java.lang.String/2004016611|545100980218|201507|1|2|3|4|2|5|5|6|7|";

curl_setopt($ch, CURLOPT_URL, "http://layanan.pln.co.id/ebill/FormInfoRekening/trans".$binary); 
$header = array(
    "Cookie:JSESSIONID=d2JkVWLpKtb4wC2HYkCLbbp42vw1snPWy7FL1qq1fz79yDMfqppJ!531973676",
    "Origin: http://layanan.pln.co.id",
    "Accept-Encoding: gzip,deflate,sdch",
    "Host: layanan.pln.co.id",
    "Accept-Language: en-US,en;q=0.8,id;q=0.6,ms;q=0.4",
    "User-Agent: Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36",
    "Content-Type: text/x-gwt-rpc; charset=UTF-8" ,
    "Accept: */*",
    "X-GWT-Module-Base: http://layanan.pln.co.id/ebill/FormInfoRekening/",
    "X-GWT-Permutation: 2393F6AAF4940001BBA4C3FFD1FC5C35",
    "Referer: http://layanan.pln.co.id/ebill/InfoRekening.html?idpel=545100980218",
    "Connection: keep-alive"
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header); // -H
curl_setopt($ch,CURLOPT_POST,true);  
$output = curl_exec($ch); 
curl_close($ch); 

