export const frontpageExp = function frontpageExports() {
  jQuery(document).ready(function ($) {
    const level1 = document.querySelectorAll(".level1-p");

    let back = document.querySelectorAll(".back");
    back.forEach((b) => {
      b.addEventListener("click", () => {
        let level1 = document.querySelector(".level1-wrap");
        level1.classList.add("show");
        const allLevel2 = document.querySelectorAll(".level2-wrapper");
        allLevel2.forEach((all) => {
          all.classList.remove("show");
          b.classList.remove("show");
        });
        const theModal = document.querySelectorAll(".job-content");
        theModal.forEach((m) => {
          m.classList.remove("show");
        });
      });
    });

    level1.forEach((level) => {
      level.addEventListener("click", () => {
        activeClass();
        let back = document.querySelectorAll(".back");
        let newClass = level.textContent + "-wrap";
        let newClassNoSpaces = newClass.replace(/\s+/g, '');
        let level2Classes = document.querySelectorAll(".level2-wrapper");
        let level1 = document.querySelector(".level1-wrap");
        level1.classList.remove("show");
       
        level2Classes.forEach((classes) => {
          if (classes.classList.contains(newClassNoSpaces)) {
            
            let target = document.querySelectorAll(`.${newClassNoSpaces}`);
            target.forEach((t) => {
              t.classList.add("show");
            });
            
            back.forEach((b) => {
              b.classList.add("show");
            });
          }
        });
      });
    });

    function activeClass() {
      level1.forEach((level) => {
        let back = document.querySelectorAll(".back");
        let newClass = level.textContent + "-wrap";
        let newClassNoSpaces = newClass.replace(/\s+/g, '');
        let level2Classes = document.querySelectorAll(".level2-wrapper");
        level2Classes.forEach((classes) => {
          if (classes.classList.contains(newClassNoSpaces)) {

            let target = document.querySelectorAll(`.${newClassNoSpaces}`);
            target.forEach((t) => {
              t.classList.remove("show");
            })
           
            back.forEach((b) => {
              b.classList.remove("show");
            });
          }
        });
      });
    }

    // modal

    let modalClick = document.querySelectorAll(".modal-click");

    modalClick.forEach((modalCl) => {
      modalCl.addEventListener("click", () => {
        activateClass();
        let newModalClass = modalCl.textContent + "-infowrap";
        let newModalClassNoSpaces = newModalClass.replace(/\s+/g, '');
        let theModal = document.querySelectorAll(".job-content");
        theModal.forEach((m) => {
          if (m.classList.contains(newModalClassNoSpaces)) {
            let modalTarget = document.querySelector(`.${newModalClassNoSpaces}`);
            modalTarget.classList.add("show");
          }
        });
      });
    });

    function activateClass() {
      modalClick.forEach((modalCl) => {
        let newModalClass = modalCl.textContent + "-infowrap";
        let newModalClassNoSpaces = newModalClass.replace(/\s+/g, '');
        let theModal = document.querySelectorAll(".job-content");
        theModal.forEach((m) => {
          if (m.classList.contains(newModalClassNoSpaces)) {
            let modalTarget = document.querySelector(`.${newModalClassNoSpaces}`);
            modalTarget.classList.remove("show");
          }
        });
      });
    }

    //modal exit

    let thex = document.querySelectorAll(".the-x");
    thex.forEach((x) => {
      x.addEventListener("click", () => {
        let theModal = document.querySelectorAll(".job-content");
        theModal.forEach((m) => {
          m.classList.remove("show");
        });
      });
    });

    // Arrow follow

    var arrowSpot = document.querySelector('.nsew-img-arrow');
    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");
    canvas.width = 700;
    canvas.height = 700;
    //canvas.style.border = "1px solid black";
    arrowSpot.appendChild(canvas);
    var renderSaveCount = 0; // Counts the number of mouse events that we did not have to render the whole scene

    var arrow = {
      x: 350,
      y: 350,
      image: new Image(),
    };
    var mouse = {
      x: null,
      y: null,
      changed: false,
      changeCount: 0,
    };

    arrow.image.src = "http://careercompassa.kinsta.cloud/wp-content/uploads/2021/11/arrow-new.png";

    function drawImageLookat(img, x, y, lookx, looky) {
      ctx.setTransform(1, 0, 0, 1, x, y);
      ctx.rotate(Math.atan2(looky - y, lookx - x) - Math.PI / 2); // Adjust image 90 degree anti clockwise (PI/2) because the image  is pointing in the wrong direction.
      ctx.drawImage(img, -img.width / 2, -img.height / 2);
      ctx.setTransform(1, 0, 0, 1, 0, 0); // restore default not needed if you use setTransform for other rendering operations
    }
/*     function drawCrossHair(x, y, color) {
      ctx.strokeStyle = color;
      ctx.beginPath();
      ctx.moveTo(x - 10, y);
      ctx.lineTo(x + 10, y);
      ctx.moveTo(x, y - 10);
      ctx.lineTo(x, y + 10);
      ctx.stroke();
    } */

    function mouseEvent(e) {
      // get the mouse coordinates relative to the canvas top left
      var bounds = canvas.getBoundingClientRect();
      mouse.x = e.pageX - bounds.left;
      mouse.y = e.pageY - bounds.top;
      mouse.cx = e.clientX - bounds.left; // to compare the difference between client and page coordinates
      mouse.cy = e.clienY - bounds.top;
      mouse.changed = true;
      mouse.changeCount += 1;
    }
    document.addEventListener("mousemove", mouseEvent);
    var renderTimeTotal = 0;
    var renderCount = 0;
    ctx.font = "18px arial";
    ctx.lineWidth = 1;
    // only render when the DOM is ready to display the mouse position
    function update() {
      if (arrow.image.complete && mouse.changed) {
        // only render when image ready and mouse moved
        var now = performance.now();
        mouse.changed = false; // flag that the mouse coords have been rendered
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        // get mouse canvas coordinate correcting for page scroll
        var x = mouse.x - scrollX;
        var y = mouse.y - scrollY;
        drawImageLookat(arrow.image, arrow.x, arrow.y, x, y);
        // Draw mouse at its canvas position
/*         drawCrossHair(x, y, "black");
        // draw mouse event client coordinates on canvas
        drawCrossHair(mouse.cx, mouse.cy, "rgba(255,100,100,0.2)"); */

        // draw line from arrow center to mouse to check alignment is perfect
/*         ctx.strokeStyle = "black";
        ctx.beginPath();
        ctx.globalAlpha = 0.2;
        ctx.moveTo(arrow.x, arrow.y);
        ctx.lineTo(x, y);
        ctx.stroke();
        ctx.globalAlpha = 1; */

        // Display how many renders that were not drawn and approx how much time saved (excludes DOM time to present canvas to display)
/*         renderSaveCount += mouse.changeCount - 1;
        mouse.changeCount = 0;
        var timeSaved = (renderTimeTotal / renderCount) * renderSaveCount;
        var timeRatio = ((timeSaved / renderTimeTotal) * 100).toFixed(0); */
/* 
        ctx.fillText(
          "Avoided " +
            renderSaveCount +
            " needless renders. Saving ~" +
            timeSaved.toFixed(0) +
            "ms " +
            timeRatio +
            "% .",
          10,
          20
        ); */
        // get approx render time per frame
   /*      renderTimeTotal += performance.now() - now;
        renderCount += 1; */
      }
      requestAnimationFrame(update);
    }
    requestAnimationFrame(update);

    //end
  });
};
