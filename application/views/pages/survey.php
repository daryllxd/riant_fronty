<section id="survey-form" class="container">
    <div class="row">
        <div class="span12">
            <h1>Post-Usage Evaluation</h1>

            <p>Thank you for using our system. Your answers will be completely confidential.</p>



            <form action="<?php echo base_url('submit_survey'); ?>" method="post" class="form-inline">

                <table class="table">
                    <tr>
                        <td colspan="2"><strong>Hello.</strong></td>
                    </tr>
                    <tr>
                        <td>
                            I am a...
                        </td>
                        <td class="choices">

                            <label class="radio inline">
                                <input type="radio" name="survey-profession" value="designer">
                                Web designer
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="survey-profession" value="developer">
                                Web developer
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="survey-profession" value="both">
                                Both
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>I have been creating websites for...</td>
                        <td class="choices">

                            <div class="input-append">
                                <input name="survey-years-experience" id="appendedInput" class="inline" type="number" value="1">
                                <span class="add-on">years</span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>When I develop web sites, I use a/an...</td>
                        <td class="choices">

                            <label class="checkbox inline">
                                <input type="checkbox" name="survey-tools-used" id="optionsRadios1" value="text editor" checked>
                                <a class="tooltipper" data-toggle="tooltip" title="Notepad++, Sublime Text, Vim, Emacs">Text Editors</a>
                            </label>
                            <label class="checkbox inline">
                                <input type="checkbox" name="survey-tools-used" value="ide">
                                <a class="tooltipper" data-toggle="tooltip" title="Eclipse, Netbeans, Visual Studio">IDEs</a>
                            </label>
                            <label class="checkbox inline">
                                <input type="checkbox" name="survey-tools-used" value="wysiwyg">
                                <a class="tooltipper" data-toggle="tooltip" title="Dreamweaver, Amaya">WYSIWYG</a>
                            </label>
                            <label class="checkbox inline">
                                <input type="checkbox" name="survey-tools-used" value="website builder">
                                <a class="tooltipper" data-toggle="tooltip" title="Weebly, Wix, Yola">Website Builders</a>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"><strong>What were your experiences while using our software?</strong></td>
                    </tr>


                    <?php
                    foreach ($questions as $resource) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $resource['question_text']; ?>
                            </td>
                            <td class="question choices">
                                <label class="radio inline">
                                    <input type="radio" name="survey-question-<?php echo $resource['question_id']; ?>" value="1" checked>
                                    Yes
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="survey-question-<?php echo $resource['question_id']; ?>" value="0">No
                                </label>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>


                </table>                

                <div class="control-group">
                    <div class="controls">
                        <a <?php // echo base_url('submit_survey'); ?>" id="submit-survey" class="btn">Submit</a>
                    </div>
                </div>
            </form>


            <!--<a class="btn btn-orange"><h2>Sign up for free</h2></a>-->
        </div>
    </div>
</section>
