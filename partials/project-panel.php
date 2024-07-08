<div class="accordion-item mb-3">
    <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="11" height="11" viewBox="0 0 11 11">
                <defs>
                  <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#61e1cb"/>
                    <stop offset="1" stop-color="#00e16f"/>
                  </linearGradient>
                </defs>
                <circle id="Ellipse_210" data-name="Ellipse 210" cx="5.5" cy="5.5" r="5.5" fill="url(#linear-gradient)"/>
            </svg>
            <div class="ms-2">Your project</div>
        </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
        <div class="accordion-body">
            <table>
                <tr>
                    <td class="bold"><b>Project</b></td>
                    <td class="ms-4 d-block"><?=$initiative?></td>
                </tr>
                <tr>
                    <td class="bold"><b>Task Name</b></td>
                    <td class="ms-4 d-block"><?=$taskName?></td>
                </tr>
                <tr>
                    <td class="bold"><b>Template Name</b></td>
                    <td class="ms-4 d-block"><?=$templateName?></td>
                </tr>
            </table>
        </div>
    </div>
</div>