# Generated by Django 2.0.7 on 2018-08-02 06:43

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0021_auto_20180802_0643'),
    ]

    operations = [
        migrations.AlterField(
            model_name='business',
            name='category',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.DO_NOTHING, related_name='category_select', to='business.Categories'),
        ),
    ]