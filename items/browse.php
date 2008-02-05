<?php head(array('title'=>'Browse Items')); ?>
	<div id="primary" class="browse">
		<h1>Browse Items</h1>
		<ul class="navigation" id="secondary-nav">
			<?php nav(array('Browse All' => uri('items/browse'), 'Browse by Tag' => uri('items/tags'))); ?>
		</ul>
		<?php echo htmlentities($_GET['tag']);?>
			<div class="pagination top"><?php echo pagination_links(); ?></div>
			<?php 
			foreach($items as $key => $item): ?>
			<div class="item hentry">
				<div class="item-meta">
				<h3><?php link_to_item($item, 'show', null, array('class'=>'permalink')); ?></h3>

				<?php if(has_thumbnail($item)): ?>
				<div class="item-img">
					<a href="<?php echo uri('items/show/'.$item->id); ?>"><?php echo square_thumbnail($item); ?></a>						
				</div>
				<?php endif; ?>

				<?php if($item->description): ?>
				<div class="desc">
				<?php echo nls2p(h($item->description)); ?>
				</div>
				<?php endif; ?>
				
				<?php if($text = item_metadata($item,'Text')): ?>
				<div class="text">
				<p><?php echo snippet($text,'0','150'); ?></p>
				</div>
				<?php endif; ?>

				<?php if(count($item->Tags)): ?>
				<div class="tags"><p><strong>Tags:</strong> 
				<?php foreach ($item->Tags as $tag): ?>
				<a href="<?php echo uri('items/browse/tag/'.urlencode($tag->name)); ?>" rel="tag"><?php echo h($tag->name); ?></a>
				<?php endforeach; ?>
				</div>
				<?php endif;?>

				</div>
			</div>
			<?php endforeach; ?>
			<div class="pagination bottom"><?php echo pagination_links(); ?></div>
			
	</div>
<?php foot(); ?>