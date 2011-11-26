/**
 * @author pazguille
 */
//Funcione globales

function getXHR(){
	var req;
	if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    }else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }
	return req;
};

function setAjax(that, url, get, post, funct){ 
	if(post != "" && get == ""){
		that.xhr.open("POST", url+"?cache="+Math.random(), true);
		that.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		funct;
		that.xhr.send(post);
	}else if(post != "" && get != "" ){
		that.xhr.open("POST", url+"?"+get+"&cache="+Math.random(), true);
		that.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		funct;
		that.xhr.send(post);
	}else{
		that.xhr.open("GET", url+"?"+get+"&cache="+Math.random(), true);
		funct;
		that.xhr.send(null);
	};
	//that.xhr.setRequestHeader("Connection", "close");	no anda en IE
};

function conocerTecla(elEvento){
	var evento = elEvento || window.event;//Guardo el evento que se produce
	var caracter = evento.charCode || evento.keyCode;
	return caracter;
};


//es para que se muestre el recaptcha
function showRecaptcha(element, submitButton, themeName) {
	Recaptcha.create('6LeP-wYAAAAAAOX77HO_ToFLoliVmZYp1tHdiQd4', element, {
	theme: themeName,
	tabindex: 0,
	callback: Recaptcha.focus_response_field
	});
};

function crearString(a2string){
	var finalString = "";
	
	for(var r=0; r<a2string.length; r++){
		if(r>0){
			finalString += "&";
		};
		finalString += a2string[r] + "=" + encodeURIComponent(document.getElementById(a2string[r]).value);
	};
	return finalString + "&nocache=" + Math.random();
};

function ocultar(elemento){
	//document.getElementById(elemento).style.display = "none";
	$(elemento).fadeOut('normal');
};

function Modal(){//.appendChild(thatModal.close); agregar esa linea siempre despues de que se cargue la pagina en js
	this.oBody = document.body; //tomo el body
	this.fondo = document.createElement("div");//Creo lo que sería el telon  - propiedadesotras se heredan desde css
	this.ModalConte = document.createElement("div");//Creo el contenedor(ventana modal) - propiedades se heredan desde css
	this.conte = document.createElement("div");//Creo el contenedor de contenidos - propiedades se heredan desde css
	this.close = document.createElement("div");

	this.oBody.appendChild(this.fondo);//meto el fondo en el body
	this.ModalConte.appendChild(this.conte);
	this.ModalConte.appendChild(this.close);
	this.oBody.appendChild(this.ModalConte);//meto el conte en el body

	thatModal = this;
	
	this.SetFondo = function(){
		//Seteo el telon y la venta modal para el fondo
		var PantallaUsuarioH = Number(screen.height); //Calculo el height de la pantalla del usuario con screen.height
		this.fondo.id = "Masc";//con este id setee las propiedades en style.css
		this.fondo.style.height = PantallaUsuarioH + "px";//seteo que tenga el msimo alto que a pantalla visible del usuario
		this.fondo.style.display = "none";
		this.fondo.style.zIndex = "10";
		//Si se hace click afuera de la pantalla se cierra la ventana modal
		this.fondo.onclick = function(){
			$("#ModalConte").fadeOut('normal');
			$("#Masc").fadeOut('normal');
			$(thatModal.ModalConte).fadeOut('normal');
			$(thatModal.fondo).fadeOut('normal');
		};
	};
	
	this.setConte = function(){
		//Seteo la ventana modal donde se cargará el contenido desde ajax
		this.ModalConte.id = "ModalConte";
		this.conte.id = "ConteReg";//con este id setee las propiedades en style.css
		//this.ModalConte.className = "borde";
		this.ModalConte.style.zIndex = "20";
		this.ModalConte.style.display = "none";
		//Le indico el boton con el cual se podra cerrar la ventana modal
		this.close.style.position = "absolute";
		this.close.style.zIndex = "30";
		this.close.style.width = "16px";
		this.close.style.height = "16px";
		this.close.style.top = "9px";
		this.close.style.right = "10px";
		this.close.style.cursor = "pointer";
		this.close.innerHTML = '<img src="images/iconos/cerrar.png" alt="Cerrar" />';
		this.close.onclick = function(){
			$("#ModalConte").fadeOut('normal');
			$("#Masc").fadeOut('normal');
			$(thatModal.ModalConte).fadeOut('normal');
			$(thatModal.fondo).fadeOut('normal');
		};
	};
	
	//Si se aperta Esc se cierra la ventana modal
	this.closeModal = function(){
		document.onkeyup = function(elEvento){
			var caract = conocerTecla(elEvento);
			if (caract == 27) {//27 es el char code de la tecla Esc
				$("#ModalConte").fadeOut('normal');
				$("#Masc").fadeOut('normal');
				$(thatModal.ModalConte).fadeOut('normal');
				$(thatModal.fondo).fadeOut('normal');
			};
		};
	};
	
	this.SetFondo();
	this.setConte();
	this.closeModal();
	
};


function getUrl(name){
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp ( regexS );
	var tmpURL = window.location.href;
	var results = regex.exec(tmpURL);
	if(results == null)
		return"";
	else
		return results[1];
}

function obtenerHijos(contenedor, tag){
	return contenedor.getElementsByTagName(tag);
};

function obtenerFormHijos(contenedor){
	var aHijos = contenedor.getElementsByTagName('input')
	aHijos[aHijos.length] = contenedor.getElementsByTagName('textarea')
	aHijos[aHijos.length] = contenedor.getElementsByTagName('select')
	return aHijos;
};

function getHijos(contenedor){
	var aPVs = new Array;

	for(i=0; i<contenedor.childNodes.length; i++){
		// Si es INPUT
		if(contenedor.childNodes[i].tagName == 'input'){
			// Si es type TEXT
			if(contenedor.childNodes[i].type == 'text'){
				aPVs[i] = contenedor.childNodes[i];
			// Si es type CHECKBOX
			}else if(contenedor.childNodes[i].type == 'checkbox'){
				// Si esta CHECKED
				if(contenedor.childNodes[i].checked){
					aPVs[i] = contenedor.childNodes[i];
				// Si NO esta CHECKED
				}else{
					aPVs[i] = contenedor.childNodes[i];
				};
			// Si es type RADIO
			}else if(contenedor.childNodes[i].type == 'radio'){
				// Si esta CHECKED
				if(contenedor.childNodes[i].checked){
					aPVs[i] = contenedor.childNodes[i];
				};
			};
		// Si es SELECT
		}else if(contenedor.childNodes[i].tagName == 'select'){
			var sel = contenedor.childNodes[i];
			getstr += sel.name + "=" + sel.options[sel.selectedIndex].value + "&";
		// Si es FIELDSET o DIV o UL o LI
		}else if(contenedor.childNodes[i].tagName == 'fieldset' || contenedor.childNodes[i].tagName == 'div' || contenedor.childNodes[i].tagName == 'ul' || document.childNodes[i].tagName == 'li'){
			aPVs[i] = contenedor.childNodes[i];
		};
	};	
	return aPVs;
};

function Contador(area, disp){
	this.area = area;
	this.disp = disp;
	this.limite = Number(this.disp.innerHTML);
	
	thatCont = this;
	
	this.contar = function(){
		// Si lo que escribe supera el limite, no dejo que escriba mas
		if(thatCont.area.value.length > thatCont.limite){
			thatCont.area.value = thatCont.area.value.substring(0, thatCont.limite);
		// Si lo que escribe esta dentro del limite, muestro el limite - cant.carac.
		}else{
			thatCont.disp.innerHTML = thatCont.limite - thatCont.area.value.length;
		};
	};
	
	this.area.onkeydown = this.contar;
	this.area.onkeyup = this.contar;
};


function selectMulti(selectID){
	var oSelect = document.getElementById(selectID);
	var aSelected = new Array();
	var cont = 0;
	for (var i=0; i<oSelect.options.length; i++) {//estan los options del select
		if(oSelect.options[i].selected){
			aSelected[cont] = oSelect.options[i].value;
			cont++;
		};
	};
	return aSelected;	
};

function ucFirst(string){
	return string.substr(0,1).toUpperCase() + string.substr(1,string.length);
};