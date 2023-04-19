$(document).ready(function () {
  const FetchProjects = () => {
    axios.get(SERVER_PATH + "/" + "GetProjects").then((response) => {
      const projects = response.data;
      const projectSelect = document.querySelector(".ActivityProjectsG");

      console.log(response.data);

      // Clear any existing options
      projectSelect.innerHTML = "";

      // Create a default option
      const defaultOption = document.createElement("option");
      defaultOption.text = "Option";
      projectSelect.add(defaultOption);

      // Populate the select element with options for each project
      projects.forEach((project) => {
        const option = document.createElement("option");
        option.value = project.PID;
        option.text = project.ProjectName;
        projectSelect.add(option);
      });
    });
  };

  /* End projectSelect*/
  const FetchModules = (PID) => {
    // alert(SERVER_PATH + "/" + "GetModules/" + PID);
    axios.get(SERVER_PATH + "/" + "GetModules/" + PID).then((response) => {
      const projects = response.data;
      const projectSelect = document.querySelector(".FetchedProjectModules");

      console.log("Modules" + response.data);

      // Clear any existing options
      projectSelect.innerHTML = "";

      // Create a default option
      const defaultOption = document.createElement("option");
      defaultOption.text = "Option";
      projectSelect.add(defaultOption);

      // Populate the select element with options for each project
      projects.forEach((project) => {
        const option = document.createElement("option");
        option.value = project.MID;
        option.text = project.ProjectModuleName;
        projectSelect.add(option);
      });
    });
  };
  const MgtActivities = (MID) => {
    window.location.href = SERVER_PATH + "/MgtActivities/" + MID;
  };

  const DetectPID = () => {
    var selectElement = $(".ActivityProjectsG");

    selectElement.on("change", function () {
      var selectedValue = selectElement.val();

      return FetchModules(selectedValue);
    });
  };

  const ErrorEmptySet = () => {
    Swal.fire(
      "Error, Empty Record Set",
      "The selected query returned no records",
      "error"
    );
  };

  $(document).on("click", ".MgtActivities", function () {
    var BID = $(".FetchedProjectModules").val();
    if (BID === "Option") {
      ErrorEmptySet();
    } else {
      MgtActivities(BID);
    }
  });

  DetectPID();
  FetchProjects();
});
