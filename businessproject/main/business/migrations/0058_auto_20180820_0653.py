# Generated by Django 2.1 on 2018-08-20 06:53

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0057_auto_20180817_1151'),
    ]

    operations = [
        migrations.AddField(
            model_name='business',
            name='total_votes',
            field=models.IntegerField(default='0'),
        ),
        migrations.AddField(
            model_name='business',
            name='votes_number',
            field=models.IntegerField(default='0'),
        ),
    ]
