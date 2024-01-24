<div class="topbar-left">
	<div class="element element-search hidden-xs hidden-sm">
		<a href="javascript:void(0)" class="zoa-icon search-toggle">
			<svg
				width="20"
				height="20"
				id="Layer_2"
				x="0px"
				y="0px"
				viewBox="0 0 90 90"
				style="enable-background:new 0 0 90 90;"
			>
				<g>
					<path d="M0,39.4C0,50,4.1,59.9,11.6,67.3c7.4,7.5,17.3,11.6,27.8,11.6c9.5,0,18.5-3.4,25.7-9.5l19.8,19.7c1.2,1.2,3.1,1.2,4.2,0c0.6-0.6,0.9-1.3,0.9-2.1s-0.3-1.5-0.9-2.1L69.3,65.1c6.2-7.1,9.5-16.2,9.5-25.7c0-10.5-4.1-20.4-11.6-27.9C59.9,4.1,50,0,39.4,0C28.8,0,19,4.1,11.6,11.6S0,28.9,0,39.4z M63.1,15.8c6.3,6.3,9.8,14.7,9.8,23.6S69.4,56.7,63.1,63s-14.7,9.8-23.6,9.8S22.2,69.3,15.9,63C9.5,56.8,6,48.4,6,39.4s3.5-17.3,9.8-23.6S30.5,6,39.4,6S56.8,9.5,63.1,15.8z" />
				</g>
			</svg>
		</a>
	</div>
	<div class="element element-user hidden-xs hidden-sm">
		<a href="javascript:void(0)" class="zoa-icon js-user">
			<svg
				width="19"
				height="20"
				id="Layer_3"
				x="0px"
				y="0px"
				viewBox="0 0 100 102.8"
				style="enable-background: new 0 0 100 102.8"
			>
				<g>
					<path d="M75.7,52.4c-2.1,2.3-4.4,4.3-7,6C82.2,58.8,93,69.9,93,83.5v12.3H7V83.5c0-13.6,10.8-24.7,24.3-25.1c-2.6-1.7-5-3.7-7-6C10.3,55.9,0,68.5,0,83.5v15.8c0,1.9,1.6,3.5,3.5,3.5h93c1.9,0,3.5-1.6,3.5-3.5V83.5C100,68.5,89.7,55.9,75.7,52.4z" />
					<g>
						<path d="M50,58.9c-16.2,0-29.5-13.2-29.5-29.5S33.8,0,50,0s29.5,13.2,29.5,29.5S66.2,58.9,50,58.9z M50,7C37.6,7,27.5,17.1,27.5,29.5S37.6,51.9,50,51.9s22.5-10.1,22.5-22.5S62.4,7,50,7z" />
					</g>
				</g>
			</svg>
		</a>
	</div>
	<div class="element element-cart">
		<a href="javascript:void(0)" class="zoa-icon icon-cart">
			<svg
				width="20"
				height="20"
				id="Layer_4"
				x="0px"
				y="0px"
				viewBox="0 0 55.4 55.4"
				style="enable-background: new 0 0 55.4 55.4"
			>
				<g>
					<rect x="0.2" y="17.4" width="55" height="3.4" />
				</g>
				<g>
					<polygon points="7.1,55.4 3.4,27.8 3.4,24.1 7.3,24.1 7.3,27.6 10.5,51.6 44.9,51.6 48.1,27.6 48.1,24.1 52,24.1 52,27.9 48.3,55.4" />
				</g>
				<g>
					<path d="M14,31.4c-0.1,0-0.3,0-0.5-0.1c-1-0.2-1.6-1.3-1.4-2.3L19,1.5C19.2,0.6,20,0,20.9,0c0.1,0,0.3,0,0.4,0c0.5,0.1,0.9,0.4,1.2,0.9c0.3,0.4,0.4,1,0.3,1.5l-6.9,27.5C15.6,30.8,14.8,31.4,14,31.4z" />
				</g>
				<g>
					<path d="M41.5,31.4c-0.9,0-1.7-0.6-1.9-1.5L32.7,2.4c-0.1-0.5,0-1.1,0.3-1.5s0.7-0.7,1.2-0.8c0.1,0,0.3,0,0.4,0c0.9,0,1.7,0.6,1.9,1.5L43.4,29c0.1,0.5,0,1-0.2,1.5c-0.3,0.5-0.7,0.8-1.1,0.9c-0.2,0-0.3,0-0.4,0.1C41.6,31.4,41.6,31.4,41.5,31.4 z" />
				</g>
			</svg>
			<span class="count cart-count">{{ count($cart_products) }}</span>
		</a>
	</div>
</div>