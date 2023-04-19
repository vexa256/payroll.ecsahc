const SERVER_PATH = `${window.location.protocol}//${window.location.host}`;
// alert(SERVER_PATH);

$(document).ready(function () {
  $(document).on("click", ".MgtModules", function () {
    axios.get(SERVER_PATH + "/" + "GetProjects").then((response) => {
      const projects = response.data;
      const projectSelect = document.querySelector(".FetchedData");

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
  });

  $(document).on("click", ".GoToMgtProj", function () {
    var FetchedData = $(".FetchedData").val();

    if (FetchedData == "Option") {
      Swal.fire(
        "Error",
        "No field can be left empty. Fill in all values and try again.",
        "error"
      );
    } else {
      window.location.href = SERVER_PATH + "/MgtProjectModules/" + FetchedData;
    }
  });

  //   Activities

  $(document).on("click", ".GetActivities", function () {
    axios.get(SERVER_PATH + "/" + "GetActivities").then((response) => {
      const projects = response.data;
      const projectSelect = document.querySelector(".FetchedDataActivities");

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
  });
});
