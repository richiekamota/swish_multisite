<% if $Children %>
		
		<% loop $Children %>
			<li class="$LinkingMode " >
				<a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">					
					$MenuTitle.XML					
				</a>

				<% if $Children %>
					<ul id="sub$ID">					
						<% include RecursiveMenu %>	
					</ul>				
				<% end_if %>

			</li>
		<% end_loop %>

<% end_if %>
