<style>
    .js-cookie-consent {
        position: fixed;
        bottom: 0;
        width: 100%;
        margin: 0 !important;
        z-index: 999;
        border-radius: 0;
        transition: all 500ms ease-out;
        color: #ecf0f1;
        padding:10px 10px;
        text-align:center;
        background-color: white;
    }
    .cookiealert a {
        text-decoration: underline
    }
    
    .cookiealert .acceptcookies {
        margin-left: 10px;
        vertical-align: baseline;
    }
    </style>
    
    <div class="js-cookie-consent cookie-consent bg-dark text-white">
    
        <span class="cookie-consent__message">
            {!! trans('cookieConsent::texts.message') !!} <a href="https://www.cnil.fr/fr/definition/cookie/" target="_blank" class="btn btn-secondary" data-dismiss="modal">En savoir plus</a>
        </span>
    
        <button class="btn btn-light js-cookie-consent-agree cookie-consent__agree">
            {{ trans('cookieConsent::texts.agree') }}
        </button>
    
    </div>
    
    