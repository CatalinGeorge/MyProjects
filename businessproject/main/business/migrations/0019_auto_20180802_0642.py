# Generated by Django 2.0.7 on 2018-08-02 06:42

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0018_auto_20180802_0641'),
    ]

    operations = [
        migrations.AlterField(
            model_name='business',
            name='category',
            field=models.OneToOneField(null=True, on_delete=django.db.models.deletion.DO_NOTHING, related_name='category_select', to='business.Categories'),
        ),
    ]
