/**
 * Main script file.
 * @copyright Copyright (C) 2020 Ondrej Golasowski, Petr Kucera
 * @license GPL(GPLv3)
 */

 /* 
  * DOM
 */
const searchInputElement = document.getElementById("input_searchInput");

/*
 *  Load functions when page is fully loaded.
 */

$(document).ready(() => {
  searchForm();
  change_text_via_date();
  menu();
  removeImageAttr();
  addTOCIcon();
  window.onscroll = () => {
    backTopButton();
  };
  cookiesSetting();
  makeIframeVisible();
});

const validateSearch = () => searchInputElement.value !== "";

function backTopButton() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    $("#backTop").addClass("show");
  } else {
    $("#backTop").removeClass("show");
  }
}

function goTop() {
  if (
    document.body.scrollTop !== 0 ||
    document.documentElement.scrollTop !== 0
  ) {
    window.scrollBy(
      0,
      -Math.max(
        1,
        Math.floor(
          (document.body.scrollTop || document.documentElement.scrollTop) / 10
        )
      )
    );
    requestAnimationFrame(goTop);
  }
}

function menu() {
  $("#button_menu").on("click", () => {
    $("#button_menu").toggleClass("active");
    $("#section_menu").toggleClass("active");
  });
}

function searchForm() {
  $("#input_searchSubmit").on("click", () => {
    $("#input_search").submit();
  });

  $("#input_search").on({
    mouseenter: () => {
      $("#input_searchInput").addClass("active");
      $("#logo_stclogo").addClass("hidden");
    },

    focuson: () => {
      $("#input_searchInput").addClass("active");
      $("#logo_stclogo").addClass("hidden");
    },

    mouseleave: () => {
      if (
        !$("#input_searchInput").val() &&
        !$("#input_searchInput").is(":focus")
      ) {
        $("#input_searchInput").removeClass("active");
        $("#logo_stclogo").removeClass("hidden");
      }
    },

    focusout: () => {
      if (!$("#input_searchInput").val()) {
        $("#input_searchInput").removeClass("active");
        $("#logo_stclogo").removeClass("hidden");
      }
    },
  });
}

/**
 * @description Remove fixed img dimensions attributes.
 */
function removeImageAttr() {
  $("img").removeAttr("width height");
}

/**
 * @description Add MS icon to the Easy TOC plugin's TOC.
 */
function addTOCIcon() {
  $(".ez-toc-icon-toggle").addClass("ms-Icon ms-Icon--ContextMenu");
}

function cookiesSetting() {
  $("#cookies-notice-settings-triger").on("click", () => {
    /*
     * Prepare text to be appended by cookie settings
     */

    const cookieNoticeMsg = `<div class="cookies-notice-settings">
    <a href="" id="cookies-setting-close"><i class="ms-Icon ms-Icon--ChromeClose" aria-hidden="true"></i></a>
    <div class="cookies-notice-settings__info">
        <h4>Nastavení souborů Cookies</h4>
        <div class="cookies-notice-settings__info__about">
            <h5>1. Co jsou soubory cookies</h5>
            <p>
                Soubory cookies jsou krátké textové soubory, které internetová stránka odešle do vašeho prohlížeče. Umožňují internetové stránce zaznamenat informace o vaší návštěvě, například zvolený jazyk a podobně. Následující návštěva
                stránek tak pro vás může být snazší a příjemnější. Soubory cookies jsou důležité, neboť bez nich by procházení sítě Internet bylo mnohem složitější. Soubory cookies umožňují lepší využití naší internetové stránky a
                přizpůsobení jejího obsahu vašim potřebám. Soubory cookies používá téměř každá internetová stránka na světě. Soubory cookies jsou užitečné, protože zvyšují uživatelskou přívětivost opakovaně navštívené internetové stránky.
            </p>
            <h5>2. Druhy souborů cookies</h5>
            <p>
                Relační (tedy dočasné) soubory cookies nám umožňují propojovat vaše jednotlivé aktivity po dobu prohlížení těchto internetových stránek. V okamžiku otevření okna vašeho prohlížeče se tyto soubory aktivují a deaktivují se po
                zavření okna vašeho prohlížeče. Relační cookies jsou dočasné a po zavření prohlížeče se všechny tyto soubory vymažou.
            </p>
            <p>
                Trvalé soubory cookies nám pomáhají váš počítač identifikovat, jestliže opětovně navštívíte naši internetovou stránku. Další výhodou trvalých cookies je to, že nám umožňují přizpůsobit naše internetové stránky vašim
                potřebám.
            </p>
            <h5>3. Využívání souborů cookies</h5>
            <p>
                V souladu s ustanovením § 89 odst. 3 zák. č. 127/2005 Sb., o elektronických komunikacích, v účinném znění, si vás tímto dovolujeme informovat, že naše internetové stránky využívají pro svoji činnost soubory cookies, tedy
                vaše soubory cookies, včetně trvalých, zpracováváme. Internetové prohlížeče obvykle obsahují správu souborů cookies. V rámci nastavení vašeho prohlížeče tak pravděpodobně můžete jednotlivé soubory cookies ručně mazat,
                blokovat či zcela zakázat jejich používání. Pro více informací použijte nápovědu vašeho internetového prohlížeče. Jsou-li cookies povoleny, lze toto nastavení internetového prohlížeče považovat za souhlas se zpracováním
                osobních údajů. Prohlížeč je nástrojem zprostředkování souhlasu.
            </p>
            <h5>4. Účel použití souborů cookies</h5>
            <p>
                K personalizaci obsahu a reklam, poskytování funkcí sociálních médií a analýze naší návštěvnosti využíváme soubory cookies. Informace o tom, jak náš web používáte, sdílíme se svými partnery působícími v oblasti sociálních
                médií, inzerce a analýz. Používáním internetových stránek vyjadřujete souhlas propojením následujících služeb: Google Analytics, Facebook Pixel.
            </p>
            <p>Soubory cookies využíváme, kromě účelu uvedeného v předchozím odstavci, pouze pro měření návštěvnosti webové stránky.</p>
            <h5>5. Správce osobních údajů</h5>
            <p>
                Provozovatelem webové stránky studuj.digital a správcem osobních údajů je společnost: PREFIX, s.r.o., sídlem U Parku 103, 252 50 Vestec, identifikační číslo 63988330, zapsaná v obchodním rejstříku Městského soudu v Praze,
                oddíl C, vložka 38582.
            </p>
            <h5>​6. Zásady ochrany osobních údajů</h5>
            <p>Podrobnější informace o souborech cookies a zpracování tvých osobních údajů najdete v našich <a href="https://studuj.digital/zasady-ochrany-osobnich-udaju/">Zásadách ochrany osobních údajů</a>.</p>
        </div>
        <div class="cookies-notice-settings__info__needed">
            <h4>Nezbytné</h4>
            <p>
                Tyto soubory cookie jsou nutné pro základní funkce stránky, a jsou proto vždy povolené. Mezi ně patří soubory cookie, které stránce umožňují si vás zapamatovat při procházení stránky v rámci jedné relace nebo, pokud o ně
                požádáte, mezi relacemi.
            </p>
        </div>
        <div class="cookies-notice-settings__info__no-needed">
            <h4>Volitelné</h4>
            <h5>Výkon</h5>
            <p>
                Tyto soubory cookie nám pomáhají vylepšovat funkce stránek sledováním využití této webové stránky. V některých případech zrychlují zpracování vašeho požadavku a umožňují nám zapamatovat si vaše vybrané předvolby na stránce.
                Pokud soubory cookie zakážete, může se tím zhoršit přesnost našich doporučení a zpomalit funkčnost stránek.
            </p>
            <h5>Sociální média a relamy</h5>
            <p>
                Díky souborům cookies sociálních médií si můžete připojit ke svým sociálním sítím a prostřednictvím sociálních médií sdílet obsah z naší webové stránky. Reklamní soubory cookie (třetích stran) shromažďují informace pro lepší
                přizpůsobení reklamy tvým zájmům, a to na webových stránkách studuj.digital i mimo ně. V některých případech tyto soubory cookies zpracovávají vaše osobní údaje. Pokud chcete získat více informací o zpracování osobních
                údajů, přečtěte si naše Zásady ochrany osobních údajů. Pokud zakážete soubory cookies, mohou se zobrazovat reklamy, které méně souvisejí s vašimi zájmy, nebo nebudete moci účinně používat odkazy na Facebook, Instagram či
                jiné sociální sítě anebo nebudete moci sdílet obsah na sociálnch médiích.
            </p>
            <a href="" class="ce-disable">vypnout volitelné soubory Cookies</a>
        </div>
    </div>
    </div>`;

    $("#ce-banner-html").after(cookieNoticeMsg);
  });
}

/**
 * @description changing text in campaign banner
 */
function change_text_via_date(){
  const date_now = new Date();
  const some_day = new Date(2020, 10, 3);
  if(date_now > some_day) {
    $("#campaign-date").text('10. 11. 2020');
  }
}
