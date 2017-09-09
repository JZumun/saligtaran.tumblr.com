import debounce from "debounce";
import setPhotoset from "set-photoset";

const ratios = [...document.querySelectorAll(".index-content .post")].map(el => {
	const media = el.querySelector(".media-content");
	const width = media ? media.getAttribute("width") : 10000;
	const height = media ? media.getAttribute("height") : 100;
	el.dataset.height = height;
	el.dataset.width = width;
	return width/height;
});

const photoSetting = () => {
	const sizeDemand = Math.min(window.innerWidth, 1000) * 2.9 / 1000;
	const layout = ratios.reduce(({size,layout},curr) => {
		/* if current is wider than desired,
				but previous is less than half of desired,
				put curr along with others  */
		if (curr > sizeDemand && size < sizeDemand/2) {
			layout.pop();
			layout[layout.length - 1]+=1;
		}
		/* if desired size is reached, add new row*/
		if (size > sizeDemand || curr > sizeDemand) {
			size = 0;
			layout.push(0);
		}
		size += curr;
		layout[layout.length - 1] += 1;
		return { layout, size };
	}, {size: 0, layout: [0]}).layout.join("");

	setPhotoset(document.querySelector("#content.index-content"),{
		layout,
		immediate: true,
		childHeight: "data-height",
		childWidth: "data-width",
		childItem: "article",
		gutter: "1em"
	}, "articles");
};

photoSetting();

window.addEventListener("resize", debounce(photoSetting, 500));
