/* Jquery section */

$(document).ready(function()
{

    $(".nie_potrzebuje").click(function ()
    {
        $(".bez_ograniczen").prop('checked', false);
	$(".edycja_towaru_zapotrzebowanie").val("0");     
    });
    $(".bez_ograniczen").click(function ()
    {
        $(".nie_potrzebuje").prop('checked', false);
	$(".edycja_towaru_zapotrzebowanie").val("-1");
    });
    $(".daje").click(function ()
    {
	$('#multiCollapseExample1').collapse('show');
	$('#multiCollapseExample2').collapse('hide');
        $(".daje .top-menu").toggleClass("top-menu_active");
        $(".szukam .top-menu").removeClass("top-menu_active");
	$('html, body').animate({ scrollTop: parseInt($(".daje").offset().top)}, 10);
    });
    
    $(".szukam").click(function ()
    {
	$('#multiCollapseExample1').collapse('hide');
	$('#multiCollapseExample2').collapse('show');
        $(".szukam .top-menu").toggleClass("top-menu_active");
        $(".daje .top-menu").removeClass("top-menu_active");
	$('html, body').animate({ scrollTop: parseInt($(".szukam").offset().top)}, 10);
    });
    
		
    var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = window.location.search.substring(1),
	    sURLVariables = sPageURL.split('&'),
	    sParameterName,
	    i;

	for (i = 0; i < sURLVariables.length; i++) {
	    sParameterName = sURLVariables[i].split('=');

	    if (sParameterName[0] === sParam) {
		return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
	    }
	}
	return false;
    };
    
    
    $(".status").click(function ()
    {
        var towar_id=$(this).attr("data-towar_id");
        var towar_status=$(this).attr("data-towar_status");
        if (towar_status==1)
            var status=0;
        else
            var status=1;
        $.ajax({
            url	: '',
            type    : 'POST',
            data    : {'change_status':'true', 'toward_id':towar_id, 'status':status},
            async   : false,
            dataType: 'json',
            success : function(resp){
                location.reload();
            },
            error   : function(resp){
                alert("Bład odczytu ajax - tr69 tags - skontaktuj sie z administratorem.");
            }
        });
    });
    
    $(".btn-dodaj_towar").click(function ()
    {
	var towar_id=$(this).attr("data-towar_id");
        $(".zapisz_btn").attr("data-zapisz_towar_id",towar_id);
        $(".zapisz_btn").attr("data-towar_akcja","zapisz_nowy");
        let dropdown2 = $('.edycja_kategoria2');
        let dropdown3 = $('.edycja_kategoria3');
        dropdown2.empty();
        dropdown3.empty();
        $(".edycja_towaru_nazwa").val("");
	$(".edycja_towaru_opis").val("");
	$(".edycja_towaru_zapotrzebowanie").val("-1");
	$(".edycja_towaru_dostepnosc").val("0");
	$(".edycja_towaru_jednostka_miary").val("szt");
        $(".row_edycja_kategoria1").show();
        $(".row_edycja_kategoria2").show();
        $(".row_edycja_kategoria3").hide();
        $(".modal-title").html("Dodaj towar");
        $("#suggesstion-box").hide();
	$(".valid_box").addClass('d-none');
	$(".nie_potrzebuje").prop('checked', false);
	$(".bez_ograniczen").prop('checked', true);
	
//	Odczytanie i ustawienie wartosci menu z URL
	var id_kategorie__glowne = getUrlParameter('id_kategorie__glowne');
	var id_wiersz_kategorie__podkategorie_poziom_0 = getUrlParameter('id_wiersz_kategorie__podkategorie_poziom_0');
	var id_wiersz_kategorie__podkategorie_poziom_1 = getUrlParameter('id_wiersz_kategorie__podkategorie_poziom_1');	
	
//	Zaladowanie pozycji menu
	$.ajax({
		url	: '',
		type    : 'POST',
		data    : {'get_kategoria_poz2':'true', 'kategoria_id':id_kategorie__glowne},
		async   : false,
		dataType: 'json',
		success : function(resp){
		    $('.edycja_kategoria2').append($('<option>',{value: '',text : ''}));
		    jQuery.each(resp, function(index, item) {
		       $('.edycja_kategoria2').append($('<option>',{value: index,text : item}));
		    });
		},
		error   : function(resp){
		    alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
		}
	    });
	    
	$.ajax({
	    url	: '',
	    type    : 'POST',
	    data    : {'get_kategoria_poz3':'true', 'kategoria_id':id_wiersz_kategorie__podkategorie_poziom_0},
	    async   : false,
	    dataType: 'json',
	    success : function(resp){
		jQuery.each(resp, function(index, item) {
		   $('.edycja_kategoria3').append($('<option>',{value: index,text : item}));
		if (index>0)
		{
		    $(".row_edycja_kategoria3").show();
		}
		});
	    },
	    error   : function(resp){
		alert("Bład odczytu - skontaktuj sie z administratorem.");
	    }
	});
	    
	$(".edycja_kategoria1").val(id_kategorie__glowne);
	$(".edycja_kategoria2").val(id_wiersz_kategorie__podkategorie_poziom_0);
	$(".edycja_kategoria3").val(id_wiersz_kategorie__podkategorie_poziom_1);
        $(".modal_edytuj").modal('show');
    });
    
    $(".edycja_kategoria1").change(function ()
    {
        let dropdown2 = $('.edycja_kategoria2');
        let dropdown3 = $('.edycja_kategoria3');
        dropdown2.empty();
        dropdown3.empty();
	$(".row_edycja_kategoria3").hide();
	if ($(".edycja_kategoria1").val()!="")
	{
	    $.ajax({
		url	: '',
		type    : 'POST',
		data    : {'get_kategoria_poz2':'true', 'kategoria_id':$(".edycja_kategoria1").val()},
		async   : false,
		dataType: 'json',
		success : function(resp){
		    $('.edycja_kategoria2').append($('<option>',{value: '',text : ''}));
		    jQuery.each(resp, function(index, item) {
		       $('.edycja_kategoria2').append($('<option>',{value: index,text : item}));
		    });
		},
		error   : function(resp){
		    alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
		}
	    });
	}    
    });

    $(".edycja_kategoria2").change(function ()
    {
        let dropdown3 = $('.edycja_kategoria3');
        $(".row_edycja_kategoria3").hide();

        dropdown3.empty();
	if ($(".edycja_kategoria2").val()!="")
	{
	    $.ajax({
		url	: '',
		type    : 'POST',
		data    : {'get_kategoria_poz3':'true', 'kategoria_id':$(".edycja_kategoria2").val()},
		async   : false,
		dataType: 'json',
		success : function(resp){
		    jQuery.each(resp, function(index, item) {
		       $('.edycja_kategoria3').append($('<option>',{value: index,text : item}));
		    if (index>0)
		    {
			$(".row_edycja_kategoria3").show();
		    }
		    });
		},
		error   : function(resp){
		    alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
		}
	    });
	}
    });
    
    /*Wykonaj kasuj*/
    
    $(".btn-kasuj_submit").click(function ()
    {
        var towar_id_kasuj=$(".btn-kasuj_submit").attr("data-kasuj_id_towar");
            $.ajax({
            url	: '',
            type    : 'POST',
            data    : {'kasuj_towar':'true', 'towar_id':towar_id_kasuj},
            async   : false,
            dataType: 'json',
            success : function(resp){
               location.reload();
            },
            error   : function(resp){
                alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
            }
        });    
    });
    
    /*Obsouga guzika kasuj*/
    
    $(".usun_towar").click(function ()
    {
        var toward_id=$(this).attr("data-towar_id");
        var towar_nazwa=$(this).attr("data-towar_nazwa");
        $(".btn-kasuj_submit").attr("data-kasuj_id_towar",toward_id);
        $(".kasuj_towar_nazwa").html(towar_nazwa);
        $(".modal_kasuj").modal('show');
    });
    
    /* obsluga guzika zapisz towary*/
    $(".zapisz_btn").click(function ()
    {
        var toward_id=$(this).attr("data-zapisz_towar_id");
        var button_mode=$(this).attr("data-towar_akcja");
        var edycja_towaru_nazwa=$(".edycja_towaru_nazwa").val();
        var edycja_towaru_opis=$(".edycja_towaru_opis").val();
	var edycja_towaru_zapotrzebowanie=$(".edycja_towaru_zapotrzebowanie").val();
	var edycja_towaru_dostepnosc=$(".edycja_towaru_dostepnosc").val();
	var edycja_towaru_jednostka_miary=$(".edycja_towaru_jednostka_miary").val();
	var edycja_kategoria1=$(".edycja_kategoria1").val();
	var edycja_kategoria2=$(".edycja_kategoria2").val();
       	var edycja_kategoria3=$(".edycja_kategoria3").val();
        if (button_mode=="zapisz_edycje")
        {
	    if ($(".edycja_towaru_nazwa").val().length>2)
	    {
		$.ajax({
		    url	: '',
		    type    : 'POST',
		    data    : {'update_towar':'true', 'toward_id':toward_id, 'edycja_towaru_nazwa':edycja_towaru_nazwa, 'edycja_towaru_opis':edycja_towaru_opis, 'edycja_towaru_zapotrzebowanie':edycja_towaru_zapotrzebowanie, 'edycja_towaru_dostepnosc':edycja_towaru_dostepnosc, 'edycja_towaru_jednostka_miary':edycja_towaru_jednostka_miary  },
		    async   : false,
		    dataType: 'json',
		    success : function(resp){
		       location.reload();
		    },
		    error   : function(resp){
			alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
		    }
		});
	    }
	    else
	    {
		$(".valid_box").removeClass('d-none');
	    }
	}
        if (button_mode=="zapisz_nowy")
        {
	    if ($(".edycja_towaru_nazwa").val().length>2)
	    {
		$.ajax({
		    url	: '',
		    type    : 'POST',
		    data    : {'nowy_towar':'true', 'toward_id':toward_id, 'edycja_towaru_nazwa':edycja_towaru_nazwa, 'edycja_towaru_opis':edycja_towaru_opis, 'edycja_towaru_zapotrzebowanie':edycja_towaru_zapotrzebowanie, 'edycja_towaru_dostepnosc':edycja_towaru_dostepnosc, 'edycja_towaru_jednostka_miary':edycja_towaru_jednostka_miary, 'edycja_kategoria1':edycja_kategoria1, 'edycja_kategoria2':edycja_kategoria2, 'edycja_kategoria3':edycja_kategoria3  },
		    async   : false,
		    dataType: 'json',
		    success : function(resp){
		       location.reload();
		    },
		    error   : function(resp){
			alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
		    }
		});
	    }
	    else
	    {
		$(".valid_box").removeClass('d-none');
	    }
	}
    });
    
    $(".edytuj_towar").click(function ()
    {
	$(".valid_box").addClass('d-none');
	var towar_id=$(this).attr("data-towar_id");
        $(".zapisz_btn").attr("data-zapisz_towar_id",towar_id);
        $(".zapisz_btn").attr("data-towar_akcja","zapisz_edycje");
	$(".nie_potrzebuje").prop('checked', false);
	$(".bez_ograniczen").prop('checked', false);
	$(".edycja_towaru_nazwa").val="";
	$(".edycja_towaru_opis").val="";
	$(".edycja_towaru_zapotrzebowanie").val="";
	$(".edycja_towaru_dostepnosc").val="";
	$(".edycja_towaru_jednostka_miary").val="";
        $(".row_edycja_kategoria1").hide();
        $(".row_edycja_kategoria2").hide();
        $(".row_edycja_kategoria3").hide();
        $("#suggesstion-box").hide();
        $(".modal-title").html("Edytuj towar");
        $.ajax({
            url	: '',
            type    : 'POST',
            data    : {'get_towar':'true', 'towar_id':towar_id},
            async   : false,
            dataType: 'json',
            success : function(resp){
                $(".edycja_towaru_nazwa").val(resp[1]);
                $(".edycja_towaru_opis").val(resp[2]);
                $(".edycja_towaru_zapotrzebowanie").val(resp[5]);
		if (resp[5]=="-1.00")
		{
		   $(".bez_ograniczen").prop('checked', true); 
		}
		if (resp[5]=="0.00")
		{
		   $(".nie_potrzebuje").prop('checked', true); 
		}
                $(".edycja_towaru_dostepnosc").val(resp[6]);
                $(".edycja_towaru_jednostka_miary").val(resp[7]);
            },
            error   : function(resp){
                alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
            }
	});
	$(".modal_edytuj").modal('show');
    });
    
    $(".edycja_towaru_nazwa").keyup(function(){
        $("#suggesstion-box").html();
		$.ajax({
		    type: "POST",
		    url: "",
		    data: {'autosugest':true, 'keyword':$(this).val()},
		    beforeSend: function(){
			    $(".edycja_towaru_nazwa-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		    },
		    success: function(data){
			    $("#suggesstion-box").show();
			    $("#suggesstion-box").html(data);
			    $(".edycja_towaru_nazwa").css("background","#FFF");
		    }
		});
	});
	
    $(".edytuj_user").click(function ()
    {
	$(".valid_box").addClass('d-none');
	var login_id=$(this).attr("data-user_id");
        $(".zapisz_btn_edytuj_user").attr("data-zapisz_user_id",login_id);
        $(".zapisz_btn_edytuj_user").attr("data-user_akcja","zapisz_edycje");
	$(".edycja_user_login").val($(this).attr("data-user_nazwa"));
	$(".edycja_user_haslo").val("");
        $("#suggesstion-box").hide();
        $(".modal-title").html("Edytuj użytkownika");
	$(".modal_edytuj_user").modal('show');
    });
    
    
    $(".btn-dodaj_user").click(function ()
    {
	$(".valid_box").addClass('d-none');
	var login_id=$(this).attr("data-user_id");
        $(".zapisz_btn_edytuj_user").attr("data-zapisz_user_id",login_id);
        $(".zapisz_btn_edytuj_user").attr("data-user_akcja","zapisz_nowy");
	$(".edycja_user_login").val("");
	$(".edycja_user_haslo").val("");
        $("#suggesstion-box").hide();
        $(".modal-title").html("Dodaj użytkownika");
	$(".modal_edytuj_user").modal('show');
    });
    
    
        /* obsluga guzika zapisz users*/
    $(".zapisz_btn_edytuj_user").click(function ()
    {
        var login_id=$(this).attr("data-zapisz_user_id");
        var button_mode=$(this).attr("data-user_akcja");
        var edycja_towaru_login=$(".edycja_user_login").val();
        var edycja_towaru_haslo=$(".edycja_user_haslo").val();
	
        if (button_mode=="zapisz_edycje")
        {
	    if ($(".edycja_user_login").val().length>2 && $(".edycja_user_haslo").val().length>2)
	    {
		$.ajax({
		    url	: '',
		    type    : 'POST',
		    data    : {'update_user':'true', 'login_id':login_id, 'edycja_towaru_login':edycja_towaru_login, 'edycja_towaru_haslo':edycja_towaru_haslo  },
		    async   : false,
		    dataType: 'json',
		    success : function(resp){
		       location.reload();
		    },
		    error   : function(resp){
			alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
		    }
		});
	    }
	    else
	    {
		$(".valid_box").removeClass('d-none');
	    }
	}
        if (button_mode=="zapisz_nowy")
        {
	    if ($(".edycja_user_login").val().length>2 && $(".edycja_user_haslo").val().length>2)
	    {
		$.ajax({
		    url	: '',
		    type    : 'POST',
		    data    : {'nowy_user':'true', 'login_id':login_id, 'edycja_towaru_login':edycja_towaru_login, 'edycja_towaru_haslo':edycja_towaru_haslo },
		    async   : false,
		    dataType: 'json',
		    success : function(resp){
		       location.reload();
		    },
		    error   : function(resp){
			alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
		    }
		});
	    }
	    else
	    {
		$(".valid_box").removeClass('d-none');
	    }
	}
    });
    
    $(".usun_user").click(function ()
    {
        var login_id=$(this).attr("data-user_id");
        var edycja_user_login=$(this).attr("data-user_nazwa");
      	
        $(".btn-kasuj_user_submit").attr("data-kasuj_id_user",login_id);
	
        $(".kasuj_user_nazwa").html(edycja_user_login);
        $(".modal_kasuj_user").modal('show');
    });
    
    $(".btn-kasuj_user_submit").click(function ()
    {
        var towar_id_kasuj=$(".btn-kasuj_user_submit").attr("data-kasuj_id_user");
            $.ajax({
            url	: '',
            type    : 'POST',
            data    : {'kasuj_user':'true', 'user_id':towar_id_kasuj},
            async   : false,
            dataType: 'json',
            success : function(resp){
               location.reload();
            },
            error   : function(resp){
                alert("Bład odczytu ajax - skontaktuj sie z administratorem.");
            }
        });    
    });
    
    	jQuery('.lang-select').click(function() {
	  var theLang = jQuery(this).attr('data-lang');
	  jQuery('.goog-te-combo').val(theLang);

	  //alert(jQuery(this).attr('href'));
	  window.location = jQuery(this).attr('href');
	  location.reload();

	});
    
});


function selectCountry(val) {
    $(".edycja_towaru_nazwa").val(val);
    $("#suggesstion-box").hide();
}

//function googleTranslateElementInit() {
//    new google.translate.TranslateElement({pageLanguage: 'pl'}, 'google_translate_element');
//}
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'pl', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
    }
