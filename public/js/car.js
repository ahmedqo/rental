const
    tabs = document.querySelectorAll(".tabs"),
    blocks = document.querySelectorAll("[block]"),
    price = +document.querySelector("#price").textContent,
    days = document.querySelector("#days"),
    total = document.querySelector("#total"),
    smtotal = document.querySelector("#sm-total"),
    smdays = document.querySelector("#sm-days"),
    booking = document.querySelector("#book"),
    reservation = document.querySelector("#reservation"),
    smreserve = document.querySelector("#sm-reserve");

if (document.querySelector("#ui-carousel")) Slider({
    root: document.querySelector("#ui-carousel"),
    prev: document.querySelector("#ui-prev"),
    next: document.querySelector("#ui-next"),
    opts: {
        drag: true,
        gaps: 0,
    }
})

tabs.forEach(t => {
    t.addEventListener("click", e => {
        e.preventDefault();
        activeTab(t);
        const targetId = t.getAttribute("href").substring(1);
        const targetElement = document.getElementById(targetId);
        const threshold = 60;
        const offsetPosition = targetElement.offsetTop - threshold;
        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth"
        });
    });
});

function activeTab(tab) {
    tabs.forEach(t => {
        t.classList[tab === t ? "add" : "remove"]("active");
    });
}

function betweenDates(date1, date2) {
    const startDate = new Date(date1);
    const endDate = new Date(date2);
    const timeDifference = endDate - startDate;
    const millisecondsPerDay = 1000 * 60 * 60 * 24;
    const dayDifference = timeDifference / millisecondsPerDay;
    return dayDifference;
}

function ucWords(str) {
    const stringWithSpaces = str.replace(/-/g, " ").replace("pick up", "Pick-up").replace("drop off", "Drop-off");
    const words = stringWithSpaces.split(" ");
    const titleCasedString = words.map(word => {
        return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    }).join(" ");
    return titleCasedString;
}

function calcPrice() {
    const sourceElements = booking.elements;
    if (!sourceElements["pick-up-date"].value.trim() || !sourceElements["drop-off-date"].value.trim()) return;

    const nbrDays = Math.round(betweenDates(
        sourceElements["pick-up-date"].value + " " + sourceElements["pick-up-time"].value,
        sourceElements["drop-off-date"].value + " " + sourceElements["drop-off-time"].value,
    ));

    days.innerHTML = nbrDays;
    total.innerHTML = nbrDays * price;
    smtotal.innerHTML = nbrDays * price;
    smdays.innerHTML = Neo.Helper.trans("Per") + " " + nbrDays + " " + Neo.Helper.trans("Days");
}

function intersect() {
    const scrollPosition = window.scrollY || document.documentElement.scrollTop;
    let closestElement = null;
    let minDistance = Infinity;

    blocks.forEach(element => {
        const rect = element.getBoundingClientRect();
        const elementTop = rect.top + window.pageYOffset - 40;
        const distance = Math.abs(scrollPosition - elementTop);

        if (distance < minDistance) {
            minDistance = distance;
            closestElement = element;
        }
    });

    if (closestElement) {
        activeTab(document.querySelector(`[href="#${closestElement.id}"]`));
    }
}

function reserve(e) {
    e.preventDefault();
    const errors = [];
    const sourceElements = booking.elements;

    for (let i = 0; i < sourceElements.length; i++) {
        const sourceElement = sourceElements[i];
        if ("value" in sourceElement) {
            if (sourceElement.value.trim()) {
                sourceElement.classList.remove("outline", "outline-2",
                    "outline-red-400", "outline-offset-[-2px]");
            } else {
                sourceElement.classList.add("outline", "outline-2", "outline-red-400",
                    "outline-offset-[-2px]");
                Neo.Toaster.toast(Neo.Helper.trans(ucWords(sourceElement.name) + " Is Required"), "error");
            }
            errors.push(!sourceElement.value.trim());
        }
    }

    if (sourceElements["pick-up-date"].value.trim()) {
        if (betweenDates(Neo.Helper.Str.moment(new Date().toDateString()), sourceElements[
                "pick-up-date"].value) < 0) {
            sourceElements["pick-up-date"].classList.add("outline", "outline-2", "outline-red-400",
                "outline-offset-[-2px]");
            Neo.Toaster.toast(Neo.Helper.trans("Pick-up Date Must Be Today Or After"), "error");
        } else {
            sourceElements["pick-up-date"].classList.remove("outline", "outline-2", "outline-red-400",
                "outline-offset-[-2px]");
        }
        errors.push(!sourceElements["pick-up-date"].value.trim());
    }

    if (sourceElements["pick-up-date"].value.trim() && sourceElements["drop-off-date"].value.trim()) {
        if (betweenDates(sourceElements["pick-up-date"].value, sourceElements["drop-off-date"].value) < 1) {
            sourceElements["drop-off-date"].classList.add("outline", "outline-2", "outline-red-400",
                "outline-offset-[-2px]");
            Neo.Toaster.toast(Neo.Helper.trans("Drop-off Date Must Be After Pick-up Date"), "error");
        } else {
            sourceElements["drop-off-date"].classList.remove("outline", "outline-2", "outline-red-400",
                "outline-offset-[-2px]");
        }
        errors.push(!sourceElements["drop-off-date"].value.trim());
    }

    if (!errors.includes(true)) booking.requestSubmit();
}

(new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        smreserve.classList[entry.isIntersecting ? "add" : "remove"]("translate-y-full");
    });
})).observe(reservation);

booking.addEventListener("change", calcPrice);
booking.addEventListener("input", calcPrice);
window.addEventListener("scroll", intersect);
booking.addEventListener("submit", reserve);
calcPrice();