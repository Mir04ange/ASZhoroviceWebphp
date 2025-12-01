
(function () {
    const cursorSvg = "url('/SVGLOGA/sadasdsd.svg') 32 32, auto";
    function setDefaultCursor() {
        document.body.style.cursor = 'auto';
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setDefaultCursor);
    } else {
        setDefaultCursor();
    }
    document.addEventListener('mousedown', () => {
        document.body.style.cursor = cursorSvg;
    });

    document.addEventListener('mouseup', () => {
        document.body.style.cursor = 'auto';
    });
})();
