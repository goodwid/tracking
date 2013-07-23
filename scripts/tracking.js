function search_computer(modelname) {
  modelname=modelname.toUpperCase();
  document.getElementById('computermodel').value = modelname;
    switch(modelname) {
      case "QU603AW":
      case "XZ870UT":
        document.getElementById('computerfamily').value = 'HP 6200 Pro';
        document.getElementById('formfactor').selectedIndex = 0;
        break;
      case "WH255UT":
      case "WH256UT":
      case "WH257UT":
      case "WZ227UT":
      case "XT915UT":
      case "XT917UT":
        document.getElementById('computerfamily').value = 'Elitebook 8440p';
        document.getElementById('formfactor').selectedIndex = 1;
        break;
      case "NV504UT":
      case "VS828UT":
      case "VS930UT":
      case "VS931UT":
      case "XZ930UT":
        document.getElementById('computerfamily').value = 'HP 6000 Pro';
        document.getElementById('formfactor').selectedIndex = 0;
        break;
      case "XU057UT":
      case "LQ166AW":
        document.getElementById('computerfamily').value = 'Elitebook 8460p';
        document.getElementById('formfactor').selectedIndex = 1;
        break;
      default:
    }
}