// head.js - fixed version

// RTL check
(function() {
    var appStyle = document.getElementById("app-style");
    if (appStyle && appStyle.href.includes("rtl.min.css")) {
        document.getElementsByTagName("html")[0].dir = "rtl";
    }
})();

// যদি অন্যান্য logic থাকে, সেই অংশ এখানে রাখুন
// উদাহরণ: theme switching, dynamic CSS loading, etc.

// Example: theme switcher (optional)
(function() {
    var themeToggle = document.getElementById("theme-toggle");
    if (themeToggle) {
        themeToggle.addEventListener("click", function() {
            var currentHref = document.getElementById("app-style").getAttribute("href");
            if (currentHref.includes("dark")) {
                document.getElementById("app-style").href = currentHref.replace("dark", "light");
            } else {
                document.getElementById("app-style").href = currentHref.replace("light", "dark");
            }
        });
    }
})();
