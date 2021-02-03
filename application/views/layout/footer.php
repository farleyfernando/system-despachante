<!-- footer content -->
		<footer>
          <div class="text-center">
          © Todos os direitos reservados - <a target="_blank" href="https://farleyfernando.com.br">FFSoft</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

	<script src="<?php echo base_url('public/vendors/sweetalert2/sweetalert2.js'); ?>"></script>
	<script src="<?php echo base_url('public/build/js/util.js'); ?>"></script>

    <?php if(isset($scripts)): ?>

        <?php foreach($scripts as $script): ?>

            <script src="<?php echo base_url('public/'.$script); ?>"></script>

        <?php endforeach; ?>

    <?php endif; ?>

  </body>
</html>
