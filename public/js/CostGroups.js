$(function () {
  $(document).on("change", ".CostProject", function () {
    var PID = $(this).val();
    FetchModules(PID);
  });

  $(document).on("change", ".CostModules", function () {
    var MID = $(this).val();
    FetchActivities(MID);
  });

  const FetchModules = (PID) => {
    axios.get(SERVER_PATH + "/" + "GetModules/" + PID).then((response) => {
      const projects = response.data;
      const projectSelect = document.querySelector(".CostModules");

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

  const FetchActivities = (MID) => {
    axios
      .get(SERVER_PATH + "/" + "GetCostActivities/" + MID)
      .then((response) => {
        const projects = response.data;
        const projectSelect = document.querySelector(".CostActivity");

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
          option.value = project.AID;
          option.text = project.ActivityName;
          projectSelect.add(option);
        });
      });
  };

  const FetchProjects = () => {
    axios.get(SERVER_PATH + "/" + "GetProjects").then((response) => {
      const projects = response.data;
      const projectSelect = document.querySelector(".CostProject");

      console.log(response.data);

      // Clear any existing options
      projectSelect.innerHTML = "";

      // Create a default option
      const defaultOption = document.createElement("option");
      defaultOption.value = "";
      defaultOption.text = "Select a project";
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

  FetchProjects();

  $(".MgtExpenditure").click(function () {
    var AID = $(".CostActivity").val();

    if (AID == "Option") {
      Swal.fire(
        "Error",
        "No field can be left empty. Fill in all values and try again.",
        "error"
      );
    } else {
      window.location.href = SERVER_PATH + "/MgtActivityExpenditure/" + AID;
    }
  });
});
