import "./style.js";

import debounce from "debounce";
import Macy from "macy";

const masonry = new Macy({
  container: "#content.index-content",
  columns: 3,
  margin: 14,
  breakAt: {
    800: 2,
    500: 1
  }
});
