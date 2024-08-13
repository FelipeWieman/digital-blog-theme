function checkConsentStatus() {
    if (window.utag && window.utag.gdpr) {
        const consentGiven = utag.gdpr.values.consent === "true";

        if (consentGiven) {
            console.log('Consent has already been given.');

        } else {
            console.log('User consent is required.');
            utag.gdpr.showConsentPreferences();
        }
    } else {
        console.log('Tealium object is not initialized');
        waitForTealium();
    }
}

function waitForTealium() {
    var maxRetries = 20;
    var retries = 0;

    var interval = setInterval(function () {
        if (window.utag && window.utag.gdpr) {
            clearInterval(interval);
            console.log('Tealium object is now initialized');
            checkConsentStatus();
            addConsentChangeListener();
            addManualConsentButtonListener();
        } else {
            retries++;
            if (retries >= maxRetries) {
                clearInterval(interval);
                console.log('Tealium object was not initialized after several attempts');
            }
        }
    }, 500);
}

function addConsentChangeListener() {
    document.getElementById('preferences_prompt_submit').addEventListener('click', function () {
        console.log("Preferences prompt submit clicked");
        setTimeout(function () {
            const consentGiven = utag.gdpr.values.consent === "true";
            if (consentGiven) {
                console.log('Consent has been updated and given.');
            } else {
                console.log('Consent was not given.');
            }
        }, 1000);
    });
}

function activateConsentButton() {
    var consentButton = document.getElementById('cookie-settings-button');

    if (consentButton) {
        consentButton.addEventListener('click', function () {
            if (window.utag && window.utag.gdpr) {
                console.log("Cookie settings button clicked, showing consent preferences");
                utag.gdpr.showConsentPreferences(); // Trigger Tealium's consent preferences modal on click
            } else {
                console.log('Tealium object is not initialized');
            }
        });
        console.log("Cookie settings button is activated");
    } else {
        console.log("Cookie settings button not found");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    waitForTealium();
    activateConsentButton()
});