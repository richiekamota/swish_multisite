<ul class="nav navbar-nav">
	<% loop $Menu(1) %>
		<li class="$LinkingMode">
			
			<a href="$Link" title="$Title.XML">
				$MenuTitle.XML
			</a>

			<% if $ContentBlocks %>
			<ul class="sub-links hidden-xs">
				<% loop $ContentBlocks %>
				<li class="sub-link">
					<a href="$Up.Link#$NavID" title="$Title.XML">
						$Title.XML 						
					</a>
				</li>
				<% end_loop %>
			</ul>
			<% end_if %>
				
		</li>
	<% end_loop %>

</ul>