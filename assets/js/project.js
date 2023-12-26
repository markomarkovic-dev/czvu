
  const arrowScroll = document.querySelector("#post .ri-arrow-down-line");
  const scrollElement = document.querySelector(".post-content");

  arrowScroll.onclick = () => {
    scrollElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    // Calculate the offset
    const offset = 200; // Your desired offset in pixels

    // Calculate the top position of the target element
    const targetRect = arrowScroll.getBoundingClientRect();
    const targetTop = targetRect.top + window.scrollY;

    // Scroll to the element with an offset
    window.scrollTo({
        top: targetTop + offset,
        behavior: 'smooth'
    });
}
