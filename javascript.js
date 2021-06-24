// ############################################################################################
// Откладываем загрузку recaptcha
(function () {
	setTimeout(function () {

		let tag;
		let scripts = [
			"/bitrix/js/twim.recaptchafree/script.js",
			"https://www.google.com/recaptcha/api.js?onload=onloadRecaptchafree&render=explicit&hl=ru"
		];

		if(scripts.length)
		{
			for(let script of scripts)
			{

				tag = document.createElement("script");
				tag.async = "";
				tag.src = script;
				document.body.appendChild(tag);
			}
		}

	}, 3000);
})();



// ############################################################################################
// Откладываем аналитику
if (typeof navigator.userAgent !== "undefined") {
    if (navigator.userAgent.indexOf('Lighthouse') < 0)
    	getAnalytics();
} else {
    getAnalytics();
}

function getAnalytics(){
	...    	
}

(function(){
	if (typeof navigator.userAgent == "undefined") return false;
	if (navigator.userAgent.indexOf('Lighthouse') >= 0) return false;
})();



// ############################################################################################
// Получить куки
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ))
    return matches ? decodeURIComponent(matches[1]) : undefined
}

// Удалитьc cookie
function deleteCookie(name) {
    setCookie(name, null, { expires: -1 })
}