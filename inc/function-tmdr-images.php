<?php
function tmdrImage($params = [])
{
	$blockName = $params["blockName"] ?? "tmdr";
	$isLazyLoad = $params["isLazyLoad"] ?? true;
	$imgUrl = $params["imgUrl"] ?? "";
	$imgAlt = $params["imgAlt"] ?? "";
	$smallImageUrl = $params["smallImageUrl"] ?? "";
	$imgContainerAttr = $params["imgContainerAttr"] ?? "";
	$imgAttr = $params["imgAttr"] ?? "";
	$containerClass = $params["containerClass"] ?? "";
	$imageTemplate = "";
	if ($isLazyLoad) {
		$imageTemplate .=
			'<div class="' .
			$blockName .
			"__image-container " .
			$containerClass .
			'"  ' .
			$imgContainerAttr .
			'><img data-src="' .
			$imgUrl .
			'" alt="' .
			esc_html($imgAlt) .
			'" src="' .
			$smallImageUrl .
			'" class="' .
			$blockName .
			'__image ratio-item lazyload" loading="lazy" ' .
			$imgAttr .
			"></div>";
	} else {
		$imageTemplate .=
			'<div class="' .
			$blockName .
			"__image-container " .
			$containerClass .
			'" ' .
			$imgContainerAttr .
			'><img alt="' .
			esc_html($imgAlt) .
			'" src="' .
			$imgUrl .
			'" class="' .
			$blockName .
			'__image  ratio-item" ' .
			$imgAttr .
			"></div>";
	}
	return $imageTemplate;
}

function getAcfImage($params = [])
{
	$altParams = "";
	$urlParams = "";
	$urlParamsSmall = "";
	if ($params) {
		$urlParams = $params["url"];
		$altParams = $params["alt"];
		$urlParamsSmall = $params["sizes"]["thumbnail"];
	} else {
		$imageBlank = get_field("image_blank_default", "option");
		$imageBlankUrl = $imageBlank["url"];
		$imageBlankAlt = $imageBlank["alt"];
		$urlParams = $imageBlankUrl;
		$altParams = $imageBlankAlt;
		$urlParamsSmall = $imageBlankUrl; // Or some default small image URL
	}
	return [
		"url" => $urlParams,
		"thumbnail" => $urlParamsSmall,
		"alt" => $altParams,
	];
}

function getImageTemplate($params = [])
{
	$imageTemplate = "";
	if ($params) {
		$multiple = $params["multiple"] ?? false;
		$blockName = $params["blockName"] ?? "tmdr";
		$isLazyLoad = $params["isLazyLoad"] ?? true;
		$imgContainerAttr = $params["imgContainerAttr"] ?? "";
		$imgAttr = $params["imgAttr"] ?? "";
		$containerClass = $params["containerClass"] ?? "";

		$acfImage = $params["acfImage"] ?? null;
		$acfImageData = getAcfImage($acfImage);
		$imgUrl = $acfImageData["url"];
		$smallImageUrl = $acfImageData["thumbnail"];
		$imgAlt = $acfImageData["alt"];

		$acfImageMobile = $params["acfImageMobile"] ?? null;
		$acfImageMobileData = getAcfImage($acfImageMobile);
		$imgMobileUrl = $acfImageMobileData["url"];

		if ($multiple && $isLazyLoad) {
			$imageTemplate .=
				'
                <div class="' .
				$blockName .
				"__image-container " .
				$containerClass .
				'"  ' .
				$imgContainerAttr .
				'>
                    <picture>
                        <source media="(min-width:768px)" srcset="' .
				$imgUrl .
				'">
                        <img data-src="' .
				$imgUrl .
				'" alt="' .
				esc_html($imgAlt) .
				'" src="' .
				$imgMobileUrl .
				'" class="' .
				$blockName .
				'__image ratio-item lazyload" loading="lazy" ' .
				$imgAttr .
				'>
                    </picture>
                </div>';
		} elseif ($multiple) {
			$imageTemplate .=
				'
                <div class="' .
				$blockName .
				"__image-container " .
				$containerClass .
				'"  ' .
				$imgContainerAttr .
				'>
                    <picture>
                        <source media="(min-width:768px)" srcset="' .
				$imgUrl .
				'">
                        <img  alt="' .
				esc_html($imgAlt) .
				'" src="' .
				$imgMobileUrl .
				'" class="' .
				$blockName .
				'__image ratio-item" ' .
				$imgAttr .
				'>
                    </picture>
                </div>';
		} else {
			if ($isLazyLoad) {
				$imageTemplate .=
					'<div class="' .
					$blockName .
					"__image-container " .
					$containerClass .
					'"  ' .
					$imgContainerAttr .
					'><img data-src="' .
					$imgUrl .
					'" alt="' .
					esc_html($imgAlt) .
					'" src="' .
					$smallImageUrl .
					'" class="' .
					$blockName .
					'__image ratio-item lazyload" loading="lazy" ' .
					$imgAttr .
					"></div>";
			} else {
				$imageTemplate .=
					'<div class="' .
					$blockName .
					"__image-container " .
					$containerClass .
					'" ' .
					$imgContainerAttr .
					'><img alt="' .
					esc_html($imgAlt) .
					'" src="' .
					$imgUrl .
					'" class="' .
					$blockName .
					'__image  ratio-item" ' .
					$imgAttr .
					"></div>";
			}
		}
	}
	return $imageTemplate;
}

add_action("init", "tmdrImage");
add_action("init", "getAcfImage");
add_action("init", "getImageTemplate");
