// Inject default cursor CSS and manage custom SVG cursor on mouse events.
//
// CESTA K TVÉMU SVG – POUŽÍVEJ / místo \ !!!
(function () {
    const cursorSvg = "url('/SVGLOGA/sadasdsd.svg') 16 16, auto";

    // Ensure default cursor is set when DOM is ready
    function setDefaultCursor() {
        document.body.style.cursor = 'auto';
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setDefaultCursor);
    } else {
        setDefaultCursor();
    }

    // Change cursor on mousedown and restore on mouseup
    document.addEventListener('mousedown', () => {
        document.body.style.cursor = cursorSvg;
    });

    document.addEventListener('mouseup', () => {
        document.body.style.cursor = 'auto';
    });
})();
