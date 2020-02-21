<?php

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau,id, photo, title_$lang as title from #_product_list where type='san-pham' and hienthi=1 order by com, stt, id desc";
$d->query($sql);
$rs_list_schema=$d->result_array();

$d->reset();
$sql_setting = "select * from #_schema limit 0,1";
$d->query($sql_setting);
$row_schema = $d->fetch_array();
?>
<script type='application/ld+json'>{
	"@context":"http://schema.org",
	"@type":"WebSite",
	"@id":"#website",
	"url":"http://<?=$config_url?>/",
	"name":"<?=$row_schema['name']?>",
	"alternateName":"<?=$row_setting['ten_' . $lang]?>",
	"potentialAction":{"@type":"SearchAction",
	"target":"http://<?=$config_url?>/tim-kiem.html&keyword={search_term_string}",
	"query-input":"required name=search_term_string"}}
</script>
<script type='application/ld+json'>{"@context":"http://schema.org",
	"@type":"Organization",
	"url":"http://<?=$config_url?>/",
	"sameAs":[],
	"@id":"#organization",
	"name":"<?=$row_schema['name']?>",
	"logo":"http://<?=$config_url?>/<?=_upload_hinhanh_l.$row_photo['logo']?>"}
</script>
<!--Schema Professionalservice-->
<script type="application/ld+json">
	{
	"@context": "http://schema.org",
	"@type": "Professionalservice",
	"@id": "http://<?=$config_url?>/",
	"url": "http://<?=$config_url?>/",
	"additionaltype": [
		<?php $additionaltype=explode(",",$row_schema["additionaltype"]);
		if(!empty($additionaltype)){foreach($additionaltype as $k=>$v){
			echo '"'.$v.'"';
			if($k<count($additionaltype)-1) echo ',';
		}}?>
	],
	"logo": "http://<?=$config_url?>/<?=_upload_hinhanh_l.$row_photo['logo']?>",
	"image": "http://<?=$config_url?>/<?=_upload_hinhanh_l.$row_photo['photo']?>",
	"priceRange": "<?=$row_schema["priceRange"]?>",
	"hasMap": " <?=$row_schema["hasMap"]?>",
	"email": "mailto: <?=$row_setting["email"]?>",
	"founder": "<?=$row_schema["personname"]?>",
	"hasOfferCatalog": {
	"@type": "OfferCatalog",
	"name": "<?=$row_schema["hasOfferCatalog"]?>",
	"itemListElement": [
		<?php if(!empty($rs_list_schema)){ foreach($rs_list_schema as $k=>$v){?>
		{
		"@type": "ListItem",
		"position": <?=($k+1)?>,
		"name": "<?=$v["ten"]?>",
		"image": "http://<?=$config_url?>/<?=_upload_product_l.$v["photo"]?>",
		"url": "http://<?=$config_url?>/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>/"
		}
		<?php if($k<count($rs_list_schema)-1) echo ',';?>
		<?php }}?>
	]
	},
	"address": {
	"@type": "PostalAddress",
	"addressLocality": "<?=$row_schema["district"]?>",
	"addressCountry": "Việt Nam",
	"addressRegion": "<?=$row_schema["city"]?>",
	"postalCode": "<?=$row_schema["postalCode"]?>",
	"streetAddress": "<?=$row_schema["street"]?>, <?=$row_schema["ward"]?>, <?=$row_schema["district"]?>, <?=$row_schema["city"]?> <?=$row_schema["postalCode"]?>"
	},
	"description": "<?=$row_setting["description_".$lang]?>",
	"name": "<?=$row_setting["ten_$lang"]?>",
	"telephone": "<?=$row_setting["hotline"]?>",
	"openingHoursSpecification": [
	{
	"@type": "OpeningHoursSpecification",
	"dayOfWeek": [
	<?php $dayOfWeek=explode(",",$row_schema["dayOfWeek"]);
	if(!empty($dayOfWeek)){foreach($dayOfWeek as $k=>$v){
		echo '"'.$v.'"';
		if($k<count($dayOfWeek)-1) echo ',';
	}}?>
	],
	"opens": "<?=$row_schema["opens"]?>",
	"closes": "<?=$row_schema["closes"]?>"
	}
	],<?php $geo=explode(",",$row_setting['toado']);?>
	"geo": {
	"@type": "GeoCoordinates",
	"latitude": "<?=$geo[0]?>",
	"longitude": "<?=$geo[1]?>"
	},
	"potentialAction": {
	"@type": "ReserveAction",
	"target": {
	"@type": "EntryPoint",
	"urlTemplate": "<?=$row_schema["urlTemplate"]?>",
	"inLanguage": "<?=$row_schema["inLanguage"]?>",
	"actionPlatform": [
	"http://schema.org/DesktopWebPlatform",
	"http://schema.org/IOSPlatform",
	"http://schema.org/AndroidPlatform"
	]
	},
	"result": {
	"@type": "Reservation",
	"name": "<?=$row_schema["potentialAction"]?>"
	}
	},

	"sameAs": [
	<?php $sameAs=explode(",",$row_schema["sameas"]);
	if(!empty($sameAs)){foreach($sameAs as $k=>$v){
		echo '"'.$v.'"';
		if($k<count($sameAs)-1) echo ',';
	}}?>
	]
	}
</script>
<!--End Schema Professionalservice-->
<!--Schema Person-->
<script type="application/ld+json">
	{
	"@context": "http://schema.org",
	"@type": "Person",
	"name": "<?=$row_schema["personname"]?>",
	"jobTitle": "<?=$row_schema["jobTitle"]?>",
	"image": "<?=$row_schema["image"]?>",
	"worksFor": "<?=$row_schema["worksFor"]?>",
	"url": " <?=$row_schema["url"]?>",
	"sameAs": [
	<?php $personsameAs=explode(",",$row_schema["personsameAs"]);
	if(!empty($personsameAs)){foreach($personsameAs as $k=>$v){
		echo '"'.$v.'"';
		if($k<count($personsameAs)-1) echo ',';
	}}?>
	],
	"AlumniOf": [
	<?php $AlumniOf=explode(",",$row_schema["AlumniOf"]);
	if(!empty($AlumniOf)){foreach($AlumniOf as $k=>$v){
		echo '"'.$v.'"';
		if($k<count($AlumniOf)-1) echo ',';
	}}?>
	],
	"address": {
	"@type": "PostalAddress",
	"addressLocality": "<?=$row_schema["addressLocality"]?>",
	"addressRegion": "<?=$row_schema["addressRegion"]?>"
	}
	}
</script>
<!--End Schema Person-->
<!--Schema Product-->
<script type="application/ld+json">
	{
	"@context": "http://schema.org/",
	"@type": "<?=$row_schema["type"]?>",
	"name": "<?=$row_schema["name"]?>",
	"image": "http://<?=$config_url?>/<?=_upload_hinhanh_l.$row_photo['logo']?>",
	"description": "<?=$row_setting["description_".$lang]?>",
	"brand": {
	"@type": "Thing",
	"name": "<?=$row_schema["shortname"]?>"
	},
	"aggregateRating": {
	"@type": "AggregateRating",
	"ratingValue": "<?=$row_schema["ratingValue"]?>",
	"reviewCount": "<?=$row_schema["reviewCount"]?>"
	},
	<?=$row_schema["offer"]?>
	"review": {
	"@type": "Review",
	"author": "<?=$row_schema["personname"]?>",
	"datePublished": "<?=$row_schema["datePublished"]?>",
	"description": "<?=$row_schema["perdescription"]?>",
	"name": "<?=$row_schema["personname"]?>",
	"reviewRating": {
	"@type": "Rating",
	"bestRating": "5",
	"ratingValue": "5",
	"worstRating": "1"
	}
	}
	}
</script>
<!--End Schema Product-->
<?php /*
<script type="application/ld+json">
{
	"@context":"http://schema.org",
	"@type":"NewsArticle",
	"mainEntityOfPage":{
		"@type":"WebPage",
		"@id":"http://<?=$config_url?>/"
	},
	"headline":"<?=$row_setting["title_$lang"]?>",
	"description":"<?=$row_setting["description_$lang"]?>",
	"image":{

		"@type":"ImageObject",

		"url":"http://<?=$config_url?>/<?=_upload_hinhanh_l.$row_photo['logo']?>"
	},
	"datePublished":"2019-01-25 14:07:08",
	"dateModified":"2019-01-25 14:07:08",
	"author":{
		"@type":"Person",
		"name": "<?=$row_schema["personname"]?>",
		"jobTitle": "<?=$row_schema["jobTitle"]?>",
		"image": "<?=$row_schema["image"]?>",
		"worksFor": "<?=$row_schema["worksFor"]?>",
		"url": " <?=$row_schema["url"]?>",
		"sameAs": [
		<?php $personsameAs=explode(",",$row_schema["personsameAs"]);
		if(!empty($personsameAs)){foreach($personsameAs as $k=>$v){
			echo '"'.$v.'"';
			if($k<count($personsameAs)-1) echo ',';
		}}?>
		],
	},
	"publisher":{
		"@type": "Organization",
		"name":"http://<?=$config_url?>/",
		"logo":{
			"@type":"ImageObject",
			"url":"http://<?=$config_url?>/<?=_upload_hinhanh_l.$row_photo['logo']?>"
		}
	}
}
</script>*/?>
<script type="application/ld+json">
{
 "@context": "http://schema.org",
 "@type": "BreadcrumbList",
 "itemListElement":
 [
	<?php foreach($arr_breakcumb as $k=>$v){?>
	  {
	   "@type": "ListItem",
	   "position": <?=$k+1?>,
	   "item":
	   {
		"@id": "<?=$v["url"]?>",
		"name": "<?=$v["name"]?>"
		}
	  }
	  <?php if($k<count($arr_breakcumb)-1) echo ',';?>
	<?php }?>
 ]
}
</script>
<?=$row_schema["schemar"]?>