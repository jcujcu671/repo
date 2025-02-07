function numberFormat(e, t, n, u) {
    var r, m;
    return isNaN(t = Math.abs(t)) && (t = 2), null == n && (n = "."), null == u && (u = " "), (m = (r = parseInt(e = (+e || 0).toFixed(t)) + "").length) > 3 ? m %= 3 : m = 0, (m ? r.substr(0, m) + u : "") + r.substr(m).replace(/(\d{3})(?=\d)/g, "$1" + u) + (t ? n + Math.abs(e - r).toFixed(t).replace(/-/, 0).slice(2) : "")
}
/*
==========
BNB crypto
==========
*/

let bnbInput = document.getElementById("bnbInput"), bnbDays = 30;

function bnbPeriod(e) {
    bnbDays = Number(e), input = document.getElementById("bnbInput"), input.dispatchEvent(new Event("input", {bubbles: !0}))
}

bnbInput.addEventListener("input", (() => {
    let bnbRate = Number(document.getElementById("bnbRate").value);
    var e = bnbInput.value * bnbRate;
    percent = e >= 3000 ? .05 : e >= 750 ? .045 : e >= 250 ? .04 : e >= 25 ? .035 : e >= 1 ? .030 : 0;
    var t = e * percent * bnbDays, n = 40 * e;
    document.getElementById("bnbGHs").value = numberFormat(n, 0) + " GH/s",
        document.getElementById("bnbProfit").value = numberFormat(t / bnbRate, 2),
        document.getElementById("bnbPlan").innerHTML = numberFormat(100 * percent, 1),
        document.getElementById("bnbDollar").innerHTML = numberFormat(e, 2, ".", "")
}));

/*
==========
TRX crypto
==========
*/

let trxInput = document.getElementById("trxInput"), trxDays = 30;

function trxPeriod(e) {
    trxDays = Number(e), input = document.getElementById("trxInput"), input.dispatchEvent(new Event("input", {bubbles: !0}))
}

trxInput.addEventListener("input", (() => {
    let trxRate = Number(document.getElementById("trxRate").value);
    var e = trxInput.value * trxRate;
    percent = e >= 3000 ? .05 : e >= 750 ? .045 : e >= 250 ? .04 : e >= 25 ? .035 : e >= 1 ? .030 : 0;
    var t = e * percent * trxDays, n = 40 * e;
    document.getElementById("trxGHs").value = numberFormat(n, 0),
        document.getElementById("trxProfit").value = numberFormat(t / trxRate, 2),
        document.getElementById("trxPlan").innerHTML = numberFormat(100 * percent, 1),
        document.getElementById("trxDollar").innerHTML = numberFormat(e, 2, ".", "")
}));

/*
==========
ltc crypto
==========
*/

let ltcInput = document.getElementById("ltcInput"), ltcDays = 30;

function ltcPeriod(e) {
    ltcDays = Number(e), input = document.getElementById("ltcInput"), input.dispatchEvent(new Event("input", {bubbles: !0}))
}

ltcInput.addEventListener("input", (() => {
    let ltcRate = Number(document.getElementById("ltcRate").value);
    var e = ltcInput.value * ltcRate;
    percent = e >= 3000 ? .05 : e >= 750 ? .045 : e >= 250 ? .04 : e >= 25 ? .035 : e >= 1 ? .030 : 0;
    var t = e * percent * ltcDays, n = 40 * e;
    document.getElementById("ltcGHs").value = numberFormat(n, 0),
        document.getElementById("ltcProfit").value = numberFormat(t / ltcRate, 2),
        document.getElementById("ltcPlan").innerHTML = numberFormat(100 * percent, 1),
        document.getElementById("ltcDollar").innerHTML = numberFormat(e, 2, ".", "")
}));

/*
==========
doge crypto
==========
*/

let dogeInput = document.getElementById("dogeInput"), dogeDays = 30;

function dogePeriod(e) {
    dogeDays = Number(e), input = document.getElementById("dogeInput"), input.dispatchEvent(new Event("input", {bubbles: !0}))
}

dogeInput.addEventListener("input", (() => {
    let dogeRate = Number(document.getElementById("dogeRate").value);
    var e = dogeInput.value * dogeRate;
    percent = e >= 3000 ? .05 : e >= 750 ? .045 : e >= 250 ? .04 : e >= 25 ? .035 : e >= 1 ? .030 : 0;
    var t = e * percent * dogeDays, n = 40 * e;
    document.getElementById("dogeGHs").value = numberFormat(n, 0),
        document.getElementById("dogeProfit").value = numberFormat(t / dogeRate, 2),
        document.getElementById("dogePlan").innerHTML = numberFormat(100 * percent, 1),
        document.getElementById("dogeDollar").innerHTML = numberFormat(e, 2, ".", "")
}));

/*
==========
eth crypto
==========
*/

let ethInput = document.getElementById("ethInput"), ethDays = 30;

function ethPeriod(e) {
    ethDays = Number(e), input = document.getElementById("ethInput"), input.dispatchEvent(new Event("input", {bubbles: !0}))
}

ethInput.addEventListener("input", (() => {
    let ethRate = Number(document.getElementById("ethRate").value);
    var e = ethInput.value * ethRate;
    percent = e >= 3000 ? .05 : e >= 750 ? .045 : e >= 250 ? .04 : e >= 25 ? .035 : 3;
    var t = e * percent * ethDays, n = 40 * e;
    document.getElementById("ethGHs").value = numberFormat(n, 0),
        document.getElementById("ethProfit").value = numberFormat(t / ethRate, 2),
        document.getElementById("ethPlan").innerHTML = numberFormat(100 * percent, 1),
        document.getElementById("ethDollar").innerHTML = numberFormat(e, 2, ".", "")
}));



/*
==========
btc crypto
==========
*/

let btcInput = document.getElementById("btcInput"), btcDays = 30;

function btcPeriod(e) {
    btcDays = Number(e), input = document.getElementById("btcInput"), input.dispatchEvent(new Event("input", {bubbles: !0}))
}

btcInput.addEventListener("input", (() => {
    let btcRate = Number(document.getElementById("btcRate").value);
    var e = btcInput.value * btcRate;
    percent = e >= 3000 ? .05 : e >= 750 ? .045 : e >= 250 ? .04 : e >= 25 ? .035 : e >= 1 ? .030 : 0;
    var t = e * percent * btcDays, n = 40 * e;
    document.getElementById("btcGHs").value = numberFormat(n, 0),
        document.getElementById("btcProfit").value = numberFormat(t / btcRate, 2),
        document.getElementById("btcPlan").innerHTML = numberFormat(100 * percent, 1),
        document.getElementById("btcDollar").innerHTML = numberFormat(e, 2, ".", "")
}));


